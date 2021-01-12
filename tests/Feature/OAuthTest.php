<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery as m;
use Tests\TestCase;

class OAuthTest extends TestCase
{
    /** @test */
    public function redirect_to_provider()
    {
        $this->mockSocialite('github');

        $this->getJson('/oauth/github')
            ->assertRedirect();
    }

    /** @test */
    public function create_user_and_return_token()
    {
        $this->mockSocialite('github', [
            'id' => '123',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'token' => 'access-token',
            'refreshToken' => 'refresh-token',
        ]);

        $this->get('/oauth/github/callback')
            ->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->assertDatabaseHas('oauth_providers', [
            'user_id' => User::first()->id,
            'provider' => 'github',
            'provider_user_id' => '123',
            'access_token' => 'access-token',
            'refresh_token' => 'refresh-token',
        ]);
    }

    /** @test */
    public function update_user_and_return_token()
    {
        $user = User::factory()->create(['email' => 'test@example.com']);
        $user->oauthProviders()->create([
            'provider' => 'github',
            'provider_user_id' => '123',
        ]);

        $this->mockSocialite('github', [
            'id' => '123',
            'email' => 'test@example.com',
            'token' => 'updated-access-token',
            'refreshToken' => 'updated-refresh-token',
        ]);

        $this->get('/oauth/github/callback')
            ->assertSuccessful()
            ->assertSeeText('{"success":true}', false);

        $this->assertDatabaseHas('oauth_providers', [
            'user_id' => $user->id,
            'access_token' => 'updated-access-token',
            'refresh_token' => 'updated-refresh-token',
        ]);
    }

    /** @test */
    public function can_not_create_user_if_email_is_taken()
    {
        User::factory()->create(['email' => 'test@example.com']);

        $this->mockSocialite('github', ['email' => 'test@example.com']);

        $this->get('/oauth/github/callback')
            ->assertSuccessful()
            ->assertSeeText('{"error":"The email has already been taken."}', false);
    }

    protected function mockSocialite($provider, $user = null)
    {
        $mock = Socialite::shouldReceive('driver')
            ->with($provider)
            ->andReturn(m::self());

        if ($user) {
            $mock->shouldReceive('user')
                ->andReturn((new SocialiteUser)->setRaw($user)->map($user));
        } else {
            $mock->shouldReceive('redirect')
                ->andReturn(redirect('https://url-to-provider'));
        }
    }
}
