<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TaskManagment;
use App\Models\taskChat;

class taskChatController extends Controller
{
    public function taskId(request $request){
        $taskId = $request->id;
        $taskData = TaskManagment::where('id',$taskId)->first();

        return response()->json([
            "taskdata" => $taskData,
        ]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();


        $file->move(public_path('assets/chat_images'), $filename);

        return response()->json([
            'url' => url('assets/chat_images/' . $filename)
        ]);
    }


    public function taskChat(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required|string',
        ]);

        TaskChat::create([
            'task_id' => $request->task_id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function getTaskChats($taskId)
    {
        $chats = TaskChat::where('task_id', $taskId)
            ->with('sender') 
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'chats' => $chats,
        ]);
    }

    // public function chatsCount()
    // {
    //     $tasks = TaskManagment::all();
    //     $taskCommentsCount = [];

    //     foreach ($tasks as $task) {
    //         $taskCommentsCount[$task->id] = TaskChat::where('task_id', $task->id)->count();
    //     }

    //     return response()->json([
    //         'taskCommentsCount' => $taskCommentsCount,
    //     ]);
    // }


}
