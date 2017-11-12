<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

final class HomeTest extends DuskTestCase
{
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertSee('TruckTrack');
        });
    }
}
