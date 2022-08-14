<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{ 
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_user_transaction_log()
    {
        $response = $this->actingAs($this->user)->get('/user/transaction-log');
        $response->assertOk();
    }

    public function test_user_profit_log()
    {
        $response = $this->actingAs($this->user)->get('/user/profits');
        $response->assertOk();
    }
}
