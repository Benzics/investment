<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public function setUp(): void {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::find(1);
    }

    public function test_profile_page()
    {
        $response = $this->actingAs($this->user)->get('/user/profile');

        $response->assertOk();
    }

    public function test_edit_profile_page()
    {
        $response = $this->actingAs($this->user)->get('/user/edit-profile');

        $response->assertOk();
    }

    public function test_profile_edit()
    {
        $data =[
            'name' => 'test',
            'address' => 'test',
            'gender' => 'male',
            'country' => 'test',
            'zip' => 'test',
            'phone' => '123',
        ];

        $response = $this->actingAs($this->user)->post('/user/edit-profile', $data);

        $response->assertValid()->assertSessionHas('success');
    }

    public function test_image_upload()
    {
        $photo = ['image_upload_file' => UploadedFile::fake()->image('payment.jpg')];

        $response = $this->actingAs($this->user)->post('/user/image-upload', $photo);

        $response->assertJson(['status' => 'true']);

    }
}
