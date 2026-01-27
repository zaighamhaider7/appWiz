<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class milestone extends Model
{
    protected $fillable = [
        'milestone_name',
        'start_date',
        'deadline',
        'project_id',
        'status',
        'priority',
        'description'
    ];
}
