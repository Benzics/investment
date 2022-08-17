<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_admin_users_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/users');
        $response->assertOk();
    }

    public function test_admin_user_create_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/users/create');

        $response->assertOk();
    }

    public function test_admin_create_user()
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => 'password',
        ];
        $response = $this->actingAs($this->user)->post('/admin/users', $data);

        $response->assertRedirect('/admin/users')->assertValid()->assertSessionHas('success');

    }

    public function test_admin_view_user()
    {
        $response = $this->actingAs($this->user)->get('/admin/users/1');
        $response->assertOk();
    }

    public function test_admin_update_user()
    {
        $data = [
            'name' => 'test',
            'email' => 'test@mail.com',
        ];
        
        $response = $this->actingAs($this->user)->put('/admin/users/1', $data);
        $response->assertValid()->assertRedirect('/admin/users/1')->assertSessionHas('success');

    }

    public function test_admin_update_user_page()
    {
        $response = $this->actingAs($this->user)->get('/admin/users/1/edit');

        $response->assertOk()->assertValid();
    }

    public function test_admin_delete_user()
    {
        $response = $this->actingAs($this->user)->delete('/admin/users/1');

        $response->assertRedirect('/admin/users')->assertSessionHas('success');
    }
}
