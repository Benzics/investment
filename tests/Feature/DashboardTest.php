<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void 
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
    
    public function test_dashboard()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/user/dashboard');
        $response->assertOk();
    }
}
