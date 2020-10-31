<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->make();
    }

    /** @test */
    public function update_profile_info()
    {
        $this->actingAs($this->user)
            ->patchJson('/api/settings/profile', [
                'name' => 'Test User',
                'email' => 'test@test.app',
            ])
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Test User',
            'email' => 'test@test.app',
        ]);
    }

    /** @test */
    public function update_password()
    {
        $this->actingAs($this->user)
            ->patchJson('/api/settings/password', [
                'password' => 'updated',
                'password_confirmation' => 'updated',
            ])
            ->assertSuccessful();

        $this->assertTrue(Hash::check('updated', $this->user->password));
    }
}
