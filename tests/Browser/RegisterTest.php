<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Register;

class RegisterTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setup();

        static::closeAll();
    }

    /** @test */
    public function register_with_valid_data()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                ->submit([
                    'name' => 'Test User',
                    'email' => 'test@test.app',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ])
                ->assertPageIs(new User instanceof MustVerifyEmail ? Register::class : Home::class);
        });
    }

    /** @test */
    public function can_not_register_with_the_same_twice()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Register)
                ->submit([
                    'name' => 'Test User',
                    'email' => $user->email,
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ])
                ->assertSee('The email has already been taken.');
        });
    }
}
