<?php

namespace Tests\Unit\Admin;

use App\Models\User;
use App\Models\Admin;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * Admin can create a user
     *
     * @return void
     */
    public function test_admin_can_add_a_new_user()
    {
        $admin = Admin::factory()->create();

        $data = User::factory()->make()->toArray();

        $route = route('admin.store-user');

        $response = $this->actingAs($admin, 'admin')->post($route, $data);

        $response->assertSessionHas(['success']);
    }
    
    /**
     * Method test_admin_missing_user_data_redirects_with_errors
     *
     * @return void
     */
    public function test_admin_missing_user_data_redirects_with_errors()
    {
        $admin = Admin::factory()->create();

        $data = User::factory()->make()->toArray();

        unset($data['name']);

        $route = route('admin.store-user');

        $response = $this->actingAs($admin, 'admin')->post($route, $data);

        $response->assertSessionHasErrors(['name']);
    }
}
