<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WithdrawTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_user_withdraw_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/user/withdrawal');
        $response->assertOk();
    }

    public function test_user_withdraw_function()
    {
        $user = User::find(1);
        $data = [
            'amount' => '10',
            'payment_id' => '1',
        ];
        $response = $this->actingAs($user)->post('/user/withdrawal', $data);
        $response->assertValid()
            ->assertRedirect('/user/withdrawal')
            ->assertSessionHas('success');
    }
}
