<?php

namespace Tests\Feature;

use App\User;
use Mockery as m;
use Tests\TestCase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

class OAuthTest extends TestCase
{
    /** @test */
    function redirect_to_provider()
    {
        $this->mockSocialite('github');

        $this->get('/oauth/github')
            ->assertRedirect('https://url-to-provider');
    }

    /** @test */
    function create_user_and_redirect_home_with_token()
    {
        $this->mockSocialite('github', [
            'id' => '123',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'token' => 'access-token',
            'refreshToken' => 'refresh-token',
        ]);

        $this->get('/oauth/github/callback')
            ->assertRedirect('/home')
            ->assertCookie('token');

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
    function update_user_and_redirect_home_with_token()
    {
        $user = factory(User::class)->create(['email' => 'test@example.com']);
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
            ->assertRedirect('/home')
            ->assertCookie('token');

        $this->assertDatabaseHas('oauth_providers', [
            'user_id' => $user->id,
            'access_token' => 'updated-access-token',
            'refresh_token' => 'updated-refresh-token',
        ]);
    }

    /** @test */
    function can_not_create_user_if_email_is_taken()
    {
        factory(User::class)->create(['email' => 'test@example.com']);

        $this->mockSocialite('github', ['email' => 'test@example.com']);

        $this->get('/oauth/github/callback')
            ->assertRedirect('/?error=email_taken');
    }

    protected function mockSocialite($driver, $user = null)
    {
        $mock = Socialite::shouldReceive('stateless')
            ->andReturn(m::self())
            ->shouldReceive('driver')
            ->with($driver)
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
