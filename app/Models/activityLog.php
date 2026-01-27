<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activityLog extends Model
{
    protected $table = 'activitylog';
    protected $fillable = [
        'user_id',
        'action',
        'description'
    ];
}