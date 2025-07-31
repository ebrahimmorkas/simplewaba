<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id'; // Use API's user_id as primary key
    protected $keyType = 'int'; // user_id is an integer
    public $incrementing = false; // user_id is not auto-incrementing

    protected $fillable = [
        'user_id', 'email', 'name', 'user_type', 'waba_id', 'phone_number_id',
    ];

    public function getAuthPassword()
    {
        return null; // No password stored locally
    }
}