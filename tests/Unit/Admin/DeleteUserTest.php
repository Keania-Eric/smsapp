<?php

namespace Tests\Unit\Admin;

use App\Models\User;
use App\Models\Admin;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    /**
     * Admin can destroy a user
     *
     * @return void
     */
    public function test_admin_can_destroy_an_existing_user()
    {
        $admin = Admin::factory()->create();

        $user = User::factory()->create();

        $route = route('admin.destroy-user', ['user'=>$user->id]);

        $response = $this->actingAs($admin, 'admin')->post($route);
     
        $response->assertSessionHas(['success']);

        $this->assertTrue($user->refresh()->deleted_at != null);
    }
    
}
