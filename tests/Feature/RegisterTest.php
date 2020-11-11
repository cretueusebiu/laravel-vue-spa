<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;

class RegisterTest extends TestCase
{
    /** @test */
    public function can_register()
    {
        $this->postJson(RouteServiceProvider::API_BASE_URL . '/register', [
            'name' => 'Test User',
            'email' => 'test@test.app',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /** @test */
    public function can_not_register_with_existing_email()
    {
        User::factory()->create(['email' => 'test@test.app']);

        $this->postJson(RouteServiceProvider::API_BASE_URL . '/register', [
            'name' => 'Test User',
            'email' => 'test@test.app',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }
}
