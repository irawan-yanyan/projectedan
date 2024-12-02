<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        //echo "berhasil";
         //$this->get('/input/coba?name=Yanyan&lastname=Irawan')->assertSeeText("Hello Yanyan Irawan");
         $this->post('/input/coba',['name'=>"Yanyan"])->assertSeeText("Hello Yanyan");
    }

    public function testNestedInput()
    {
        $this->post('/input/coba/first',[
                                            'name'=>[
                                                        'first' => 'Yanyan'
                                                    ]])->assertSeeText('Hello Yanyan');
    }

    public function testInputAll()
    {
       $this->post('/input/hello/input',[
                    'name' => [
                                    'first' => 'Yanyan',
                                    'last' => 'Irawan'
                    ]])->assertSeeText('name')->assertSeeText('first')->assertSeeText('Yanyan')
                       ->assertSeeText('last')->assertSeeText('Irawan');
    }

    public function testArrayInput()
    {
        $this->post('/input/hello/array',[
            'products' => [
                ['name' => 'Apple Mac Book Pro'],
                ['name' => 'Samsung Galaxy S']
            ]
        ])->assertSeeText('Apple Mac Book Pro')->assertSeeText('Samsung Galaxy S');
    }


    


}
