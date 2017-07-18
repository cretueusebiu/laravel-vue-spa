<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@test.app',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])
        ->assertSuccessful()
        ->assertJsonStructure(['id', 'name', 'email']);
    }
}
