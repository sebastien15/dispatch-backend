<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class zoneTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**@test */
    public function indexBasicTest()
    {
        $response = $this->get('/api/zone');

        $response->assertStatus(200);
    }
    /**@test */
    public function testBasicTest()
    {
        

        $response = $this->post('/api/zone');
        
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
