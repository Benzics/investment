<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\RegistrationService;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_ref_user()
    {
 
        $regservice = new RegistrationService();
        
        $this->assertSame(1, $regservice->getRefUser('ZFX-100001'));
    }

    public function test_registration()
    {

        $user = [
            'name' => 'John Doe',
            'email' => 'John@test.com',
            'gender' => 'male',
            'phone' => '0123456789',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ];

        $response = $this->post('/register', $user);

        $response->assertValid();

        $new_user = array_splice($user, 0, 2);

        $this->assertDatabaseHas('users', $new_user);

    }

    public function test_registration_with_ref()
    {

        $user = [
            'name' => 'John Doe',
            'email' => 'John@test.com',
            'gender' => 'male',
            'phone' => '0123456789',
            'password' => '1234567',
            'password_confirmation' => '1234567',
            'g_id' => 'ZFX-100001',
        ];

        $response = $this->post('/register', $user);

        $response->assertValid();

        $new_user = array_splice($user, 0, 2);

        $this->assertDatabaseHas('users', $new_user);
        $this->assertDatabaseHas('profiles', ['referrer' => '1']);

    }
}
