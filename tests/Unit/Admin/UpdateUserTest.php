<?php

namespace Tests\Unit\Admin;

use App\Models\User;
use App\Models\Admin;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    /**
     * Admin can update a user
     *
     * @return void
     */
    public function test_admin_can_update_an_existing_user()
    {
        $admin = Admin::factory()->create();

        $user = User::factory()->create();
        
        $data = $user->toArray();

        $data['name'] = 'Jackson Test';

        $route = route('admin.update-user', ['user'=>$user->id]);

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

        $user = User::factory()->create();
        
        $data = $user->toArray();

        unset($data['name']);

        $route = route('admin.update-user', ['user'=>$user->id]);

        $response = $this->actingAs($admin, 'admin')->post($route, $data);

        $response->assertSessionHasErrors(['name']);
    }
}
