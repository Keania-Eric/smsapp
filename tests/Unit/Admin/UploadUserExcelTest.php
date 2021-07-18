<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use App\Models\Admin;

class UploadUserExcelTest extends TestCase
{
    /**
     * Admin can upload users excel sheet
     *
     * @return void
     */
    public function test_admin_can_upload_user_excel_sheet()
    {
        $admin = Admin::factory()->create();
    }
}
