<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userDevices extends Model
{
    protected $fillable = [
        'user_id',
        'device_name',
        'ip_address',
        'location',
        'last_login',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
