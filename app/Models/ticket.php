<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'title',
        'project_id',
        'priority',
        'description',
        'status',
        'user_id',
        'attachments'
    ];

    public function project()
    {
        return $this->belongsTo(project::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
