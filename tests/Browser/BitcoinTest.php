<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BitcoinTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSeeHeader()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies/1')
                ->assertTitleContains('Bitcoin')
                ->assertSee('Bitcoin');
        });
    }

    public function testSeeRate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/currencies/1')
                ->assertSee('$6631');
        });
    }
}
