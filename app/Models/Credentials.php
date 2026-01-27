<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    protected $fillable = [
        'platform_name',
        'account_name',
        'email',
        'password',
    ];
}
