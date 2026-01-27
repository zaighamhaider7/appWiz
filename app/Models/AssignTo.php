<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignTo extends Model
{
    protected $table = 'assign_to';
    protected $fillable = [
        'assign_to',
        'project_id',
    ];

    // public function assign()
    // {
    //     return $this->belongsTo(project::class, 'project_id');
    // }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
}
