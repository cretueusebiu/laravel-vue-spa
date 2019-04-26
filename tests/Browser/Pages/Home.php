<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Home extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/home';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->waitForLocation($this->url())->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@navbar-toggle' => '.navbar .navbar-toggler',
            '@navbar-dropdown-toggle' => '.navbar-nav.ml-auto .dropdown-toggle',
        ];
    }

    /**
     * Click on the log out link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickLogout($browser)
    {
        $browser->click('@navbar-toggle') // expand navbar by clicking on toggler
            ->waitFor('@navbar-dropdown-toggle')
            ->click('@navbar-dropdown-toggle') // expand dropdown by clicking on toggle
            ->waitForText('Logout')
            ->clickLink('Logout')
            ->pause(100);
    }
}
