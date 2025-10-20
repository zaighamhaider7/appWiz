<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\TaskManagment;

class TaskManagmentController extends Controller
{
    public function TaskView(){
        $projects = Project::all();
        $users = User::where('name', '!=', 'Admin')->get();
        return view('client.task-management', compact('projects', 'users'));
    }

    public function TaskStore(request $request){
        $validated = $request->validate([
            'task_name' => 'required|string',
            'task_category' => 'required|string',
            'project' => 'required', 
            'assign_to' => 'required',
            'start_date' => 'required|date',
            'due_date' => 'required|after_or_equal:start_date',
            'description' => 'required|string'
        ]);

        TaskManagment::create($validated);
        return redirect()->back()->with('AddTask', 'Task added successfully.');
    }

    // public function TaskData(){
    //     $tasks = TaskManagment::all();
    //     return view('client.task-management', compact('tasks'));
    // }
}
