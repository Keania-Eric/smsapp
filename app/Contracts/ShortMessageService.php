<?php
namespace App\Contracts;


interface ShortMessageService
{
    
    /**
     * Method sendSMS
     *
     * @param $message $message [explicite description]
     * @param $mobiles $mobiles [explicite description]
     *
     * @return void
     */
    public function sendSMS($message, $mobiles);
}