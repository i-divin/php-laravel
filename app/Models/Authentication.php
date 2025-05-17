<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = 'authentications';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
