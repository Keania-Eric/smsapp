<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillAdminDetails extends Migration
{

    protected $adminEmail = 'test@smsapp.com.ng';

    protected $adminPassword = 'password';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('admins')->insert([
            'name'=> 'Administrator',
            'email'=> $this->adminEmail,
            'password'=> bcrypt($this->adminPassword)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('admins')->where('email', $this->adminEmail)->delete();
    }
}
