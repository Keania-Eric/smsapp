<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageDraft extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    /**
     * Retrieve birthday message draft
     *
     * @param $query $query [explicite description]
     *
     * @return void
     */
    public function scopeBirthdayDraft($query)
    {
        $msg = $query->where('name', 'birthday')->first();
        return $msg->draft;
    }
    
    /**
     * Retrieve anniversary message draft
     *
     * @param $query $query [explicite description]
     *
     * @return void
     */
    public function scopeAnniversaryDraft($query)
    {
        $msg = $query->where('name', 'anniversary')->first();
        return $msg->draft;
    }
}
