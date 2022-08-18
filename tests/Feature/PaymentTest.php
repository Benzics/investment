<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
       
    }

    public function test_admin_payment_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/payment-settings');

        $response->assertOk();
    }

    public function test_admin_payment_create_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/payment-settings/create');

        $response->assertOk();
    }

    public function test_admin_payment_create()
    {
        $data = [
            'name' => 'Test',
            'image' => UploadedFile::fake()->image('payment.jpg'),
            'address' => 'Test',
        ];

        $response = $this->actingAs($this->user)->post('/admin/payment-settings', $data);

        $response->assertValid()->assertSessionHas('success')->assertRedirect('/admin/payment-settings');
    }

    public function test_admin_payment_view()
    {
        $response = $this->actingAs($this->user)->get('/admin/payment-settings/1');

        $response->assertOk();
    }

    public function test_admin_payment_edit_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/payment-settings/1/edit');

        $response->assertOk();
    }

    public function test_admin_payment_edit()
    {
        $data = [
            'name' => 'Test',
            'image' => UploadedFile::fake()->image('payment.jpg'),
            'address' => 'Test',
        ];

        $response = $this->actingAs($this->user)->put('/admin/payment-settings/1', $data);

        $response->assertValid()->assertSessionHas('success')->assertRedirect('/admin/payment-settings/1');
    }

    public function test_admin_payment_delete()
    {
        $response = $this->actingAs($this->user)->delete('/admin/payment-settings/1');

        $response->assertValid()->assertSessionHas('success')->assertRedirect('/admin/payment-settings');
    }

}
