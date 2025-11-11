<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\TaskManagment;
use App\Models\task_status;
use App\Models\taskChat;


class TaskManagmentController extends Controller
{
    public function TaskView(){
        $projects = Project::all();
        $users = User::where('name', '!=', 'Admin')->get();
        $tasks = TaskManagment::all();
        $taskCommentsCount = [];

        foreach ($tasks as $task) {
            $taskCommentsCount[$task->id] = TaskChat::where('task_id', $task->id)->count();
        }

        $assignUser = TaskManagment::with('assignedUser')->get();
        $taskStatus = task_status::all();

        // $statuses = ['To Do', 'In Process', 'In Review', 'Completed'];
        $statuses = task_status::pluck('task_status')->toArray();

        $tasksByStatus = [];
        foreach ($statuses as $status) {
            $tasksByStatus[$status] = TaskManagment::where('task_status', $status)->get(); 
        }

        $singleTask = null;

        return view('client.task-management', compact('projects', 'users', 'tasks', 'assignUser', 'singleTask', 'tasksByStatus', 'statuses','taskStatus', 'taskCommentsCount'));
    }

    public function TaskStore(request $request){
        $validated = $request->validate([
            'task_name' => 'required|string',
            'task_category' => 'required|string',
            'project' => 'required|string', 
            'assign_to' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|after_or_equal:start_date',
            'description' => 'required|string'
        ]);

        TaskManagment::create($validated);

        return redirect()->back()->with('AddTask', 'Task added successfully.');
    }

    public function TaskDelete($id){
        $task = TaskManagment::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('DeleteTask', 'Task deleted successfully.');
    }

    public function taskUpdate(Request $request, $id){
        $task = TaskManagment::findOrFail($id);
        $task->task_status = $request->input('task_status');

        if ($request->input('task_status') === 'Completed') {
            $task->completed_on = now()->toDateString(); 
        } else {
            $task->completed_on = null; 
        }
        $task->save();

        return redirect()->back()->with('UpdateTask', 'Task status updated successfully.');
    }

    public function taskEdit($id){
        $projects = Project::all();
        $users = User::where('name', '!=', 'Admin')->get();
        $tasks = TaskManagment::all();
        $taskCommentsCount = [];

        foreach ($tasks as $task) {
            $taskCommentsCount[$task->id] = TaskChat::where('task_id', $task->id)->count();
        }
        $assignUser = TaskManagment::with('assignedUser')->get();
        $singleTask = TaskManagment::with(['taskProject', 'assignedUser'])->findOrFail($id);
        $statuses = task_status::pluck('task_status')->toArray();
        $taskStatus = task_status::all();

        $tasksByStatus = [];
        foreach ($statuses as $status) {
            $tasksByStatus[$status] = TaskManagment::where('task_status', $status)->get(); 
        }
        return view('client.task-management', compact('singleTask', 'projects', 'users', 'tasks', 'assignUser','tasksByStatus', 'statuses', 'taskStatus', 'taskCommentsCount'));
    }

    public function singletaskUpdate(request $request){

        // dd($request->all());
        $validated = $request->validate([
            'task_id' => 'required|integer',
            'task_name' => 'required|string',
            'task_category' => 'required|string',
            'project' => 'required|string', 
            'assign_to' => 'required|string',
            'start_date' => 'required|date',
            'due_date' => 'required|after_or_equal:start_date',
            'description' => 'required|string'
        ]);

        $task = TaskManagment::findOrFail($request->task_id);

        
        $task->task_name     = $request->task_name;
        $task->task_category = $request->task_category;
        $task->project    = $request->project;     
        $task->assign_to       = $request->assign_to;   
        $task->start_date    = $request->start_date;
        $task->due_date      = $request->due_date;
        $task->description   = $request->description;

        $task->save();

        return redirect()->back()->with('UpdateSingleTask', 'Task updated successfully!');
    }



    // task status start

    public function taskStatus_store(request $request){

    $request->validateWithBag('TaskAddError', [
        'task_status' => 'required|string|max:255',
    ]);

        task_status::create($request->all());

        return redirect()->back()->with('TaskStatusAdd', 'Task Status added successfully.');
    }





}
