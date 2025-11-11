<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskManagment extends Model
{
    protected $table = 'table_task_managment';
    protected $fillable = [
        'task_name',
        'task_category',
        'project',
        'assign_to',
        'start_date',
        'due_date',
        'description',
        'task_status',
        'completed_on'
    ];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function taskProject()
    {
        return $this->belongsTo(Project::class, 'project');
    }

    

}

?>
