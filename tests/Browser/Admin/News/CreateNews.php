<?php

namespace Tests\Browser\Admin\News;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNews extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
   /* public function testExample1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Агрегатор');
        });
    }*/

    public function testExample1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/adminka/news/create')
                    ->type('title','test1628')
                    ->type('category_id','1')
                    ->type('short_discraptiont','test1628test1628test1628')
                    ->type('text','test1628test1628test1628 test1628test1628test1628')
                    ->press('Отправить новость');
        });
    }
}
