<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskManagmentController extends Controller
{
    public function TaskView(){
        return view('client.task-management');
    }
}
