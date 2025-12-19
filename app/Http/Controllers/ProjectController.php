<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Document;
use App\Models\AssignTo;
use App\Models\User;
use App\Models\milestone;
use App\Models\Test;
use App\Models\ActivityLog;
use App\Helpers\ActivityLogger;
use App\Models\Subscription;


class ProjectController extends Controller
{
    // project start
    public function create()
    {
        $userId = Auth::id();

        $users = User::where('role_id', '!=', 1)->where('is_suspended', 0)->get();

        $currentUser = auth()->user();

        if($currentUser->role_id == 1){
            $view = 'admin.project';
        }
        else{
           $subscriptionData = Subscription::limit(3)->get();
           $view = 'user.project';
        }
        
        return view($view, compact('users', 'userId','subscriptionData'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'project_name'  => 'required|string|max:255',
            'client_name'   => 'required|string|max:255',
            'membership'    => 'required|string|max:255',
            'price'         => 'required|numeric',
            'start_date'    => 'required|date',
            'assign_to'    => 'required',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'user_id'       => 'required|integer|exists:users,id',
            'document_name' => 'required|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $data = new project();
        $data->project_name = $validated['project_name'];
        $data->client_name = $validated['client_name'];
        $data->membership = $validated['membership'];
        $data->price = $validated['price'];
        $data->start_date = $validated['start_date'];
        $data->end_date = $validated['end_date'];
        $data->user_id = $validated['user_id'];
        $data->save();

        $last_project_id = $data->id;

        session(['last_project_id' => $last_project_id]);

        if ($request->has('assign_to')) {
            foreach ($validated['assign_to'] as $userId) {
                AssignTo::create([
                    'assign_to' => $userId,
                    'project_id' => $data->id,
                ]);
            }
        }

        if ($request->hasFile('document_name')) {

            $file = $request->file('document_name');

            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('projectAssets'), $filename);

            Document::create([
                'document_name' => 'projectAssets/' . $filename,
                'project_id'    => $data->id,
            ]);
        }

        ActivityLogger::log('New Project Created', 'A new project "' . $validated['project_name'] . '" was successfully created by ' . auth()->user()->name . '.');

        return response()->json(['message' => 'Data saved successfully', 'project_id' => $last_project_id]);

    }


    public function view_edit($id)
    {

        $projects = project::findorFail($id);

        return view('client.edit-project', compact('projects'));

    }

    public function delete($id)
    {
        $project = project::find($id);
        $project->delete();

        ActivityLogger::log('Project Deleted', 'The project "' . $project->project_name . '" was deleted by ' . auth()->user()->name . '.');

        return redirect()->route('project.create')->with('success', 'Project deleted successfully.');
    }

    // project end

    public function projectId(Request $request)
    {
        $projectId = $request->id;

        $projectData = project::with('creator')->where('id', $projectId)->first();

        $milestoneData = milestone::where('project_id', $projectId)->get();

        $assignedUsers = AssignTo::with('user')->where('project_id', $projectId)->get();


        return response()->json([
            "data" => $projectData,
            "milestoneData" => $milestoneData,
            "assignedUsers" => $assignedUsers
        ]);
    }

    public function edit(Request $request)
    {
        if($request->id){
            $data = project::find($request->id);
            $data->project_name = $request->project_name;
            $data->client_name = $request->client_name;
            $data->membership = $request->membership;
            $data->price = $request->price;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->user_id = $request->user_id;
            $data->save();

            if($request->has('edit_assign_to')) {
                AssignTo::where('project_id', $request->id)->delete();

                foreach ($request->edit_assign_to as $userId) {
                    AssignTo::create([
                        'assign_to' => $userId,
                        'project_id' => $data->id,
                    ]);
                }
            }

            ActivityLogger::log('Project Updated', 'The project "' . $data->project_name . '" was updated by ' . auth()->user()->name . '.');

            return response()->json(
                [
                    "sucess" => "updated"
                ]
            );
        }
        else{
            return response()->json(["error" => "error"]);
        }
    }

    public function Deleteproject(Request $request)
    {
        $projectId = $request->input('delete_id');

        $projectData = project::find($projectId);

        $projectData->Delete();

        ActivityLogger::log('Project Deleted', 'The project "' . $projectData->project_name . '" was deleted by ' . auth()->user()->name . '.');

        return response()->json([
            "delete" => 'delete'
        ]);
    }


    public function projectStatus(Request $request){
        if($request->project_status_id){
            $data = project::find($request->project_status_id);
            $data->status = $request->project_status;
            $data->save();

            ActivityLogger::log('Project Status Updated', 'The project status for "' . $data->project_name . '" was updated to "' . $data->status . '" by ' . auth()->user()->name . '.');

            return response()->json(
                [
                    "sucess" => "Status Updated"
                ]
            );
        }
    }

    public function projectList() {
        $projects = project::with('creator')->get();
        $assignedUsers = AssignTo::with(['user', 'project'])->whereHas('user')->get();

        return response()->json([
            'success' => $projects,
            'assignedUsers' => $assignedUsers
        ]);
    }

    // project end

    // milestone start
    public function milestoneStore(Request $request)
    {
        $validated = $request->validate([
            'milestone_name' => 'required|string|max:255',
            'milestone_start_date' => 'required|date',
            'deadline' => 'required|after_or_equal:start_date',
            'project_id' => 'required|exists:projects,id'
        ]);

        $data = new milestone();
        $data->milestone_name = $validated['milestone_name'];
        $data->start_date = $validated['milestone_start_date'];
        $data->deadline = $validated['deadline'];
        $data->project_id = $validated['project_id'];
        $data->save();

        ActivityLogger::log('New Milestone Added', 'A new milestone "' . $validated['milestone_name'] . '" Added by ' . auth()->user()->name . '.');

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function milestoneId(Request $request)
    {
        $milestoneId = $request->input('milestoneId');

        $milestoneData = milestone::where('id', $milestoneId)->first();

        return response()->json([
            "milestoneDatafetch" => $milestoneData
        ]);
    }

    public function editMilestone(Request $request)
    {
        if($request->milestone_id){
            $data = milestone::find($request->milestone_id);
            $data->milestone_name = $request->milestone_name;
            $data->start_date = $request->start_date;
            $data->deadline = $request->deadline;
            $data->project_id = $request->project_id;
            $data->save();
            ActivityLogger::log('Milestone Updated', 'The milestone "' . $data->milestone_name . '" was updated by ' . auth()->user()->name . '.');
            return response()->json(["success" => "updated"]);
        }
        else{
            return response()->json(["error" => "error"]);
        }
    }

    public function Deletemilestone(Request $request)
    {
        $milestoneId = $request->input('delete_id');

        $milestoneData = milestone::find($milestoneId);

        $milestoneData->Delete();

        ActivityLogger::log('Milestone Deleted', 'The milestone "' . $milestoneData->milestone_name . '" was deleted by ' . auth()->user()->name . '.');

        return response()->json([
            "delete" => 'delete'
        ]);
    }

    public function milestoneStatus(Request $request){
        if($request->milestone_status_id){
            $data = milestone::find($request->milestone_status_id);
            $data->status = $request->milestone_status;
            $data->save();
            ActivityLogger::log('Milestone Status Updated', 'The milestone status for "' . $data->milestone_name . '" was updated to "' . $data->status . '" by ' . auth()->user()->name . '.');
            return response()->json(
                [
                    "sucess" => "Status Updated"
                ]
            );
        }
    }


    public function list(Request $request)
    {
        $milestones = milestone::where('project_id', $request->project_id)->get();

        return response()->json([
            'milestonesData' => $milestones
        ]);
    }

    // milestone end

    // document start

    public function documentId(request $request){
        $projectId = $request->input('project_id');
        
        $documentData = Document::with('project.creator') 
                        ->where('project_id', $projectId)
                        ->get();

        return response([
            'documentData' => $documentData
        ]);
    }

    public function deleteDocument(request $request){
        $documentId = $request->input('document_id');

        $documentData = Document::find($documentId);

        if (File::exists(public_path($documentData->document_name))) {
            File::delete(public_path($documentData->document_name));
        }

        $documentData->Delete();

        ActivityLogger::log('Document Deleted', 'A document was deleted by ' . auth()->user()->name . '.');

        return response([
            'delete' => 'Document Deleted'
        ]);
    }
    

    public function Documentlist(request $request){
        $projectId = $request->input('project_id');

        $documentData = Document::where('project_id', $projectId)->get();

        return response([
            'documentData' => $documentData
        ]);
    }


    public function uploadDocument(request $request){
        $validated = $request->validate([
            'project_document' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'project_id' => 'required|exists:projects,id'
        ]);

        if ($request->hasFile('project_document')) {

            $file = $request->file('project_document');

            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('projectAssets'), $filename);

            Document::create([
                'document_name' => 'projectAssets/' . $filename,
                'project_id'    => $request->project_id,
            ]);
            ActivityLogger::log('New Document Uploaded', 'A new document was uploaded by ' . auth()->user()->name . '.');
        }

        return response([
            'success' => 'Document Uploaded'
        ]);
    }

    // document end


}
