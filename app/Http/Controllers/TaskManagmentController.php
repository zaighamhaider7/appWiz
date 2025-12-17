<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\TaskManagment;
use App\Models\task_status;
use App\Models\taskChat;


class TaskManagmentController extends Controller
{

    public function TaskView(){
        $projects = project::all();
        $users = User::where('role_id', '!=', 1)->where('is_suspended', 0)->get();
        $tasks = TaskManagment::all();
        $taskCommentsCount = [];

        foreach ($tasks as $task) {
            $taskCommentsCount[$task->id] = TaskChat::where('task_id', $task->id)->count();
        }

        $assignUser = TaskManagment::with('assignedUser')->get();

        $taskStatus = task_status::all();

        $tasksByStatus = [];
        foreach ($taskStatus as $status) {
            $tasksByStatus[$status->task_status] = TaskManagment::where('task_status', $status->task_status)->get();
        }

        $singleTask = null;
        $singleStatus = null;

        return view('admin.task-management', compact('projects', 'users', 'tasks', 'assignUser', 'singleTask', 'tasksByStatus','taskStatus', 'taskCommentsCount','singleStatus'));
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

        return redirect()->back()->with([
            'AddTask' => 'Task added successfully.',
            'from_section' => $request->from_section,
        ]);
    }

    public function TaskDelete($id){
        $task = TaskManagment::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('DeleteTask', 'Task deleted successfully.');
    }

    public function taskUpdate(Request $request, $id){
        $task = TaskManagment::findOrFail($id);
        $task->task_status = $request->input('task_status');

        if ($request->input('task_status') === 'Done') {
            $task->completed_on = now()->toDateString(); 
        } else {
            $task->completed_on = null; 
        }
        $task->save();

        return redirect()->back()->with('UpdateTask', 'Task status updated successfully.');
    }

    public function taskEdit($id){
        $projects = project::all();
        $users = User::where('role_id', '!=', 1)->where('is_suspended', 0)->get();
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
        foreach ($taskStatus as $status) {
            $tasksByStatus[$status->task_status] = TaskManagment::where('task_status', $status->task_status)->get();
        }
        return view('admin.task-management', compact('singleTask', 'projects', 'users', 'tasks', 'assignUser','tasksByStatus','taskStatus', 'taskCommentsCount'));
    }

    public function singletaskUpdate(request $request){

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

    public function taskStatus_delete($id){
        $status = task_status::findOrFail($id);
        $status->delete();
        return redirect()->back()->with('TaskStatusDelete', 'Task Status deleted successfully.');
    }

    public function taskStatus_edit($id){
        $singleStatus = task_status::findOrFail($id);
        $projects = project::all();
        $users = User::where('name', '!=', 'Admin')->get();
        $tasks = TaskManagment::all();
        $taskCommentsCount = [];

        foreach ($tasks as $task) {
            $taskCommentsCount[$task->id] = TaskChat::where('task_id', $task->id)->count();
        }
        $assignUser = TaskManagment::with('assignedUser')->get();
        $statuses = task_status::pluck('task_status')->toArray();
        $taskStatus = task_status::all();

        $tasksByStatus = [];
        foreach ($taskStatus as $status) {
            $tasksByStatus[$status->task_status] = TaskManagment::where('task_status', $status->task_status)->get();
        }
        return view('admin.task-management', compact( 'projects', 'users', 'tasks', 'assignUser','tasksByStatus','taskStatus', 'taskCommentsCount', 'singleStatus'));
    }

    public function taskStatusUpdate(request $request){
        $validated = $request->validate([
            'status_id' => 'required|integer',
            'task_status' => 'required|string|max:255',
        ]);

        $status = task_status::findOrFail($request->status_id);
        $status->task_status = $request->task_status;
        $status->save();

        return redirect()->route('task.view')->with('TaskStatusUpdate', 'Task Status updated successfully!');

    }


}
