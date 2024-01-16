<?php

namespace Tests\Feature\unit;

use Tests\TestCase;
use App\Http\Controllers\MessagesController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessagesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndex(): void
    {
         $response = $this->get('/');

        $response->assertStatus(200);

        $controller = new MessagesController;
    }
}
