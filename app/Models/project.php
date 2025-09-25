<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'project_name',
        'client_name',
        'membership',
        'assign_to',
        'price',
        'user',
        'start_date',
        'end_date',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
