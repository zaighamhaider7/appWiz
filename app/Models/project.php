<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'project_name',
        'client_name',
        'membership',
        'price',
        'start_date',
        'end_date',
        'user_id',
        'status',
        'is_high_priority'
    ];

     public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(
            User::class,
            'assign_to',
            'project_id',
            'assign_to'
        );
    }

}
