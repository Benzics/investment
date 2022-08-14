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

        $response = $this->actingAs($this->user)->post('/user/testimony');
        $response->assertValid()
            ->assertSessionHas('success');
    }

    public function test_affiliate_page()
    {
        $response = $this->actingAs($this->user)->get('/user/affiliate');
        $response->assertOk();
    }
}
