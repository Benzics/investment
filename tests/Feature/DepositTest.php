<?php

namespace Tests\Feature;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_admin_wallet_page()
    {
        

        $response = $this->actingAs($this->user)->get('/admin/fund-wallet');
        $response->assertOk()->assertValid();
    }

    public function test_wallet_funding()
    {
        $data = [
            'email' => 'admin@site.com',
            'amount' => '20',
        ];

        

        $response = $this->actingAs($this->user)->post('/admin/fund-wallet', $data);
        $response->assertValid()
        ->assertRedirect('/admin/fund-wallet');

    }

    public function test_admin_deposit_approve()
    {
        Deposit::factory()->create();
        $response = $this->actingAs($this->_user)->get('/admin/deposits/approve/1');

        $response->assertValid()->assertSessionHas('success');
    }

    public function test_admin_deposit_decline()
    {
        Deposit::factory()->create();
        $response = $this->actingAs($this->_user)->get('/admin/deposits/decline/1');

        $response->assertValid()->assertSessionHas('success');
    }

    public function test_admin_deposit_delete()
    {
        Deposit::factory()->create();
        $response = $this->actingAs($this->_user)->post('/admin/deposits/delete', ['id' => '1']);

        $response->assertValid()->assertSessionHas('success');
    }

    public function test_user_deposit_page()
    {
        
        $response = $this->actingAs($this->user)->get('/user/deposit');
        $response->assertOk()->assertValid();
    }

    public function test_deposit_attachment()
    {
        

        Storage::fake('payments');

        $data = [
            'attachment' => UploadedFile::fake()->image('payment.jpg'),
            'description' => 'A test',
            'amount' => '10',
            'charges' => '1',
            'payment_id' => '1',
        ];

        $response = $this->actingAs($this->user)->post('/user/deposit', $data);
        $response->assertValid()
            ->assertRedirect('/user/deposit');
    }

    public function test_deposit_preview()
    {
        
        $response = $this->actingAs($this->user)
            ->post('/user/deposit-fund', ['amount' => '10', 'charges' => '1', 'payment_id' => '1' ]);

        $response->assertOk()->assertValid();
    }

    public function test_admin_deposits_page()
    {
        
        $response = $this->actingAs($this->user)->get('/admin/deposits');
        $response->assertOk()->assertValid();
    }

    public function test_user_deposit_list()
    {
        
        $response = $this->actingAs($this->user)->get('/user/deposits');
        $response->assertOk();
    }
}
