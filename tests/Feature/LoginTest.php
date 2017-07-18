<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function can_authenticate()
    {
        $this->postJson('/api/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])
        ->assertSuccessful()
        ->assertJsonStructure(['token', 'expires_in'])
        ->assertJson(['token_type' => 'bearer']);
    }

    /** @test */
    public function can_fetch_the_current_user()
    {
        $this->actingAs($this->user)
            ->getJson('/api/user')
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /** @test */
    public function can_log_out()
    {
        $token = $this->postJson('/api/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])->json()['token'];

        $this->json('POST', "/api/logout?token=$token")
            ->assertSuccessful();

        $this->getJson("/api/user?token=$token")
            ->assertStatus(401);
    }
}
