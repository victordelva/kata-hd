<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/employees')
            ->assertResponseOk();
    }

    public function testStoreEmployee()
    {
        $this->post('/employees', [
            "name" => "Vic",
            "email" => "Vic",
            "position" => "Vic",
            "office" => "Vic",
            "salary" => "Vic",
            "working-hours" => "Vic",
        ])->assertResponseOk();
    }
}
