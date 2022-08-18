<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_admin_settings_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/settings');
        $response->assertOk();
    }

    public function test_admin_settings_update()
    {
        $data = [
            'site-name' => 'Test',
            'currency' => '1',
            'minimum-withdrawal' => '1',
            'maximum-withdrawal' => '1000',
            'withdrawal-charges' => '{"type" : 0, "amount" : "0"}',
            'withdrawal-time' => '1',
            'deposit-charges' => '{"type" : 0, "amount" : "0"}',
            'admin-mail' => 'test@site.com',
            'support-mail' => 'mail@site.com',

        ];

        $response = $this->actingAs($this->user)->post('/admin/settings', $data);

        $response->assertValid()->assertSessionHas('success')->assertRedirect('/admin/settings');
    }
}
