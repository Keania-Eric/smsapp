<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'dob',
        'anniversary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * Birthdays Today
     *
     * @param $query $query [explicite description]
     *
     * @return void
     */
    public function scopeBirthdaysToday($query)
    {
        $today  = Carbon::today();
        return $query->whereDay('dob', $today->day)->whereMonth('dob', $today->month);
    }

    /**
     * Anniversary Today
     *
     * @param $query $query [explicite description]
     *
     * @return void
     */
    public function scopeAnniversariesToday($query)
    {
        $today  = Carbon::today();
        return $query->whereDay('anniversary', $today->day)->whereMonth('anniversary', $today->month);
    }
}
