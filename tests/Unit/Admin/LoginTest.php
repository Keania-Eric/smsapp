<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Tests admin can login
     *
     * @return void
     */
    public function test_admin_can_login_successfully()
    {
        $admin = Admin::factory()->create();

        $data = ['email'=> $admin->email, 'password'=> 'password'];

        $route = route('admin.login');

        $response = $this->post($route, $data);

        $response->assertRedirect(route('admin.dashboard'));
    }


    /**
     * Tests admin cannot login with wrong credentials
     *
     * @return void
     */
    public function test_admin_cannot_login_successfully_with_wrong_credentials()
    {
        $admin = Admin::factory()->create();

        $data = ['email'=> $admin->email, 'password'=> 'wrongpassword'];

        $route = route('admin.login');

        $response = $this->post($route, $data);

        $response->assertRedirect(route('admin.login'));
    }
}
