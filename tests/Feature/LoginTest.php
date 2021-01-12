<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function authenticate()
    {
        $user = User::factory()->create();

        $this->postJson('/login', [
                'email' => $user->email,
                'password' => 'password',
            ])
            ->assertSuccessful();

        $this->assertAuthenticated();
    }

    /** @test */
    public function fetch_the_current_user()
    {
        $this->actingAs(User::factory()->create())
            ->getJson('/api/user')
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /** @test */
    public function log_out()
    {
        $this->actingAs(User::factory()->create())
            ->postJson("/logout")
            ->assertSuccessful();

        $this->assertGuest();
    }
}
