<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_admin_wallet_page()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/admin/fund-wallet');
        $response->assertOk()->assertValid();
    }

    public function test_wallet_funding()
    {
        $data = [
            'email' => 'admin@site.com',
            'amount' => '20',
        ];

        $user = User::find(1);

        $response = $this->actingAs($user)->post('/admin/fund-wallet', $data);
        $response->assertValid()
        ->assertRedirect('/admin/fund-wallet');

    }

    public function test_user_deposit_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/user/deposit');
        $response->assertOk()->assertValid();
    }

    public function test_deposit_attachment()
    {
        $user = User::find(1);

        Storage::fake('payments');

        $data = [
            'attachment' => UploadedFile::fake()->image('payment.jpg'),
            'description' => 'A test',
            'amount' => '10',
            'charges' => '1',
            'payment_id' => '1',
        ];

        $response = $this->actingAs($user)->post('/user/deposit', $data);
        $response->assertValid()
            ->assertRedirect('/user/deposit');
    }

    public function test_deposit_preview()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->post('/user/deposit-fund', ['amount' => '10', 'charges' => '1', 'payment_id' => '1' ]);

        $response->assertOk()->assertValid();
    }

    public function test_admin_deposits_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/admin/deposits');
        $response->assertOk()->assertValid();
    }

    public function test_user_deposit_list()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/user/deposits');
        $response->assertOk();
    }
}
