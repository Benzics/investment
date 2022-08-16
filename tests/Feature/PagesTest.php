<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;
    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }
    
    public function test_testimony_page()
    {
        $response = $this->actingAs($this->user)->get('/user/testimony');
        $response->assertOk();
    }

    public function test_testimony_post()
    {
        $data = ['testimony' => 'A testimony'];

        $response = $this->actingAs($this->user)->post('/user/testimony', $data);
        $response->assertValid()
            ->assertSessionHas('success');
    }

    public function test_trade_view()
    {
        $response = $this->actingAs($this->user)->get('/user/trade-view');
        $response->assertOk();
    }

    public function test_index()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertOk();
    }

    public function test_registration()
    {
        $response = $this->get('/register');
        $response->assertOk();
    }


}
