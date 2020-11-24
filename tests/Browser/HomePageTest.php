<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testBasicElements(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->assertSee('Bliv en af danmarks kommende talenter indenfor IT.')
                ->assertSee('IT-SUPPORTER')
                ->assertSee('DATATEKNIKER / PROGRAMMERING')
                ->assertSee('DATATEKNIKER / INFRASTRUKTUR');
        });
    }

    /**
     * Test education stepper
     *
     * @throws \Throwable
     */
    public function testStepper(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->waitForText('IT-SUPPORTER')
                ->click('@it-supporter')
                ->waitForText('EUD')
                ->click('@eud')
                ->waitForText('Hovedforløb')
                ->assertSee('Hovedforløb 1')
                ->assertSee('Objektorienteret programmering')
                ->assertSee('Serverteknologi webserver')
                ->assertSee('Linux rettet mod server og embedded')
                ->assertSee('Script programmering')
                ->assertSee('Hovedforløb 2')
                ->assertSee('App programmering II')
                ->assertSee('Serverteknologi Linux')
                ->assertSee('IT Service-Management II');
        });
    }
}
