<?php

namespace Tests\Browser;

use App\User;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Register;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setup();

        static::closeAll();
    }

    /** @test */
    public function register_with_valid_data()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register())
                ->submit([
                    'name'                  => 'Test User',
                    'email'                 => 'test@test.app',
                    'password'              => 'secret',
                    'password_confirmation' => 'secret',
                ])
                ->assertPageIs(Home::class);
        });
    }

    /** @test */
    public function can_not_register_with_the_same_twice()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Register())
                ->submit([
                    'name'                  => 'Test User',
                    'email'                 => $user->email,
                    'password'              => 'secret',
                    'password_confirmation' => 'secret',
                ])
                ->assertSee('The email has already been taken.');
        });
    }
}
