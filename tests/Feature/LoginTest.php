<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function authenticate()
    {
        $user = User::factory()->create();

        $this->postJson(RouteServiceProvider::API_BASE_URL.'/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
            ->assertSuccessful()
            ->assertJsonStructure(['token', 'expires_in'])
            ->assertJson(['token_type' => 'bearer']);
    }

    /** @test */
    public function fetch_the_current_user()
    {
        $this->actingAs(User::factory()->create())
            ->getJson(RouteServiceProvider::API_BASE_URL.'/user')
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /** @test */
    public function log_out()
    {
        $token = $this->postJson(RouteServiceProvider::API_BASE_URL.'/login', [
            'email' => User::factory()->create()->email,
            'password' => 'password',
        ])->json()['token'];

        $this->postJson(RouteServiceProvider::API_BASE_URL."/logout?token=$token")
            ->assertSuccessful();

        $this->getJson(RouteServiceProvider::API_BASE_URL."/user?token=$token")
            ->assertStatus(401);
    }
}
