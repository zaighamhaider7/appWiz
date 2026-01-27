<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task_status extends Model
{
    protected $table = 'task_status';
    protected $fillable = [
        'task_status',
    ];
}
