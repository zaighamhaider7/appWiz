<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class milestone extends Model
{
    use SoftDeletes;
    
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
