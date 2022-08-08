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
}
