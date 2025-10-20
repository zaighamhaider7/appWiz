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
        'task_status'
    ];
}

?>
