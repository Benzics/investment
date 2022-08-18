<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public $user;

    public function setUp(): void 
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }
    
    public function test_dashboard()
    {
        $response = $this->actingAs($this->user)->get('/user/dashboard');
        $response->assertOk();
    }

    public function test_admin_dashboard()
    {
        $response = $this->actingAs($this->user)->get('/admin/dashboard');
        $response->assertOk();
    }

    public function test_referrals_page()
    {
        $response = $this->actingAs($this->user)->get('/user/referrals');
        $response->assertOk();
    }
}
