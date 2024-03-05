<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'saadi@gmail.com')
            ->type('password', '12345678')
            ->press('Login') // Assuming you have a login button with the text "Login"
            ->assertPathIs('/dashboard');
        });
    }
}
