<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactController extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsert(){
        $this->browse(function ($browser) {
            $browser->visit('/home')
                    -> assertSee('Latest Transactions');
        });
        /*$this->visit('/insertContact')
         ->type('ivan', 'name')
         ->type('ivan@gmail.com', 'email')
         ->type('21 1234-56789', 'tel_number')
         ->press('enviar')
         ->seePageIs('/');*/
    }
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function testCreate()
    {
        $response = $this->get('/createContact');
        $response->assertStatus(200);
    }
    public function testEdit_found()
    {   //caso encontre o contato definido
        $response = $this->get('/edit/1');
        $response->assertStatus(200);
    }
    public function testEdit_not_found()
    {   //caso nao encontre o contato definido
        $response = $this->get('/edit/1');
        $response->assertStatus(302);
    }


    public function testDestroy()
    {
        $response = $this->delete('/remove/1');
        $response->assertRedirect('/');
    }
}
