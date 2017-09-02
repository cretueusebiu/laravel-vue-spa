<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setup();

        static::closeAll();
    }

    /** @test */
    function login_with_valid_credentials()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->submit($user->email, 'secret')
                ->assertPageIs(Home::class);
        });
    }

    /** @test */
    public function login_with_invalid_credentials()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login)
                ->submit('test@test.app', 'secret')
                ->assertSee('These credentials do not match our records.');
        });
    }

    /** @test */
    public function log_out_the_user()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->submit($user->email, 'secret')
                ->on(new Home)
                ->clickLogout()
                ->assertPageIs(Login::class);
        });
    }
}
