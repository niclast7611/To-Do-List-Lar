<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/dashboard');
        $response = $this->get('/todos/create');
        $response = $this->get('/todos/*/edit/');
        $response = $this->get('/todos');

        $response->assertStatus(200);
    }
    public function test_the_application_returns_an_unsuccessful_response()
    {
        $response = $this->get('*');

        $response->assertStatus(404);
    }
}
