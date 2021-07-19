<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillMessageDrafts extends Migration
{
    protected $preloadData;

    public function __construct()
    {
        $this->setPreloadData();
    }
    
    /**
     * Method setPreloadData
     *
     * @return void
     */
    protected function setPreloadData()
    {
        $this->preloadData  = [
            'birthday'=> 'We are so happy its your birthday. Be happy and be safe',
            'anniversary'=> 'Its your anniversary today and we are happy to share this with you'
        ];
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach($this->preloadData as $index=>$value) {
            DB::table('message_drafts')->insert([
                'name'=> $index,
                'draft'=> $value
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach($this->preloadData as $index=>$value) {
            DB::table('message_drafts')->where('name', $index)->delete();
        }
    }
}
