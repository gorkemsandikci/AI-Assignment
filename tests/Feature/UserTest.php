<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/auth', [
            'deviceName' => 'Test Device',
            'deviceUuid' => '12345',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'device_name' => 'Test Device',
            'device_uuid' => '12345',
        ]);
    }
}
