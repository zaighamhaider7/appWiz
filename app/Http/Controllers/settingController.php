<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\project;
use App\Models\AssignTo;
use App\Models\NotificationPreference;

class settingController extends Controller
{
    public function addRoles(Request $request){
        $request->validate([
            'name' => 'required|string',
            'access' => 'nullable',
            'icon' => 'nullable|string',
        ]);
        $name = $request->input('name');
        if($request->hasFile('file')){
         $file = $request->file('file');
         $filename = time() . '_' . $file->getClientOriginalName();

        // Move file to /public/userAssets
         $file->move(public_path('userAssets'), $filename);

        // Save relative path in DB
         $icon = 'userAssets/' . $filename;        
        }
        else{
            $icon = null;
        }
         $jaccess = $request->except('name', 'icon', '_token');
         $access = json_encode($jaccess);

        Roles::create([
            'name' => $name,
            'icon' => $icon,
            'access' => $access
        ]);
        return redirect()->back()->with('status','role-added');
    }

    public function memberAdd(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
            'project_id' => 'nullable|exists:projects,id',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);

        if ($request->filled('project_id')) {
            AssignTo::create([
                'assign_to' => $user->id,
                'project_id' => $request->input('project_id'),
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function singleMember(Request $request){
        $userId = $request->input('user_id');

        $user = User::find($userId);

        $assignProject = AssignTo::where('assign_to', $userId)->first();

        if ($user) {
            $projects = $user->assignedProjects()->get();
        } else {
            $projects = collect();
        }


        $singleMember = User::with('role')->where('id',$userId)->first();

        $projects = $user->assignedProjects()->get();

        return response()->json([
            "singleMember" => $singleMember,
            "projects" => $projects,
            "assignProject" => $assignProject
        ]);
    }

    public function memeberList(){
        $users = User::with('role')->get();
        return response()->json([
            "users" => $users
        ]);
    }

    public function memberUpdate(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$request->input('user_id'),
            'role_id' => 'required|exists:roles,id',
            'project_id' => 'nullable|exists:projects,id',
        ]);

        $user = User::find($request->input('user_id'));

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->save();

        AssignTo::updateOrCreate(
            ['assign_to' => $user->id],
            ['project_id' => $request->input('project_id')]
        );

        return response()->json([
            'success' => true,
            'singleMember' => $user->load('role'),
        ]);
    }

    public function memberDelete(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->input('user_id'));

        if ($user) {
            AssignTo::where('assign_to', $user->id)->delete();
            $user->delete();

            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }
    }


    public function update(Request $request)
    {
        $user = auth()->user(); 

        $notifications = NotificationPreference::updateOrInsert(
            [
                'user_id' => $user->id,
                'notification_type' => $request->notification_type
            ],
            [
                'is_enabled' => $request->is_enabled,
                'updated_at' => now(),
            ]
        );

        return response()->json(['status' => 'success', 'is_enabled' => $request->is_enabled]);
    }
    
}
