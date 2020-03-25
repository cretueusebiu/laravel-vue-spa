<?php

namespace Tests\Feature;

use App\Notifications\VerifyEmail;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class VerificationTest extends TestCase
{
    /** @test */
    public function can_verify_email()
    {
        $user = factory(User::class)->create(['email_verified_at' => null]);
        $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), ['user' => $user->id]);

        Event::fake();

        $this->postJson($url)
            ->assertSuccessful()
            ->assertJsonFragment(['status' => 'Your email has been verified!']);

        Event::assertDispatched(Verified::class, function (Verified $e) use ($user) {
            return $e->user->is($user);
        });
    }

    /** @test */
    public function can_not_verify_if_already_verified()
    {
        $user = factory(User::class)->create();
        $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), ['user' => $user->id]);

        $this->postJson($url)
            ->assertStatus(400)
            ->assertJsonFragment(['status' => 'The email is already verified.']);
    }

    /** @test */
    public function can_not_verify_if_url_has_invalid_signature()
    {
        $user = factory(User::class)->create(['email_verified_at' => null]);

        $this->postJson("/api/email/verify/{$user->id}")
            ->assertStatus(400)
            ->assertJsonFragment(['status' => 'The verification link is invalid.']);
    }

    /** @test */
    public function resend_verification_notification()
    {
        $user = factory(User::class)->create(['email_verified_at' => null]);

        Notification::fake();

        $this->postJson('/api/email/resend', ['email' => $user->email])
            ->assertSuccessful();

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    /** @test */
    public function can_not_resend_verification_notification_if_email_does_not_exist()
    {
        $this->postJson('/api/email/resend', ['email' => 'foo@bar.com'])
            ->assertStatus(422)
            ->assertJsonFragment(['errors' => ['email' => ['We can\'t find a user with that e-mail address.']]]);
    }

    /** @test */
    public function can_not_resend_verification_notification_if_email_already_verified()
    {
        $user = factory(User::class)->create();

        Notification::fake();

        $this->postJson('/api/email/resend', ['email' => $user->email])
            ->assertStatus(422)
            ->assertJsonFragment(['errors' => ['email' => ['The email is already verified.']]]);

        Notification::assertNotSentTo($user, VerifyEmail::class);
    }
}
