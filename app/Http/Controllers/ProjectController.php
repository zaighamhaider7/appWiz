<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Document;
use App\Models\User;
use App\Models\Milestone;
use App\Models\Test;

class ProjectController extends Controller
{
    // project start
    public function create()
    {
        $userId = Auth::id();

        $projects = project::all();

        $documents = Document::all();

        $users = User::all();

        $projects = Project::with('user')->get();


        return view('project', compact('projects', 'users', 'userId' ,'documents'));
    }

    public function store(Request $request)
    {

        $data = new project();
        $data->project_name = $request->project_name;
        $data->client_name = $request->client_name;
        $data->membership = $request->membership;
        $data->assign_to = $request->assign_to;
        $data->price = $request->price;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->user_id = $request->user_id;
        $data->save();

        $last_project_id = $data->id;

        session(['last_project_id' => $last_project_id]);

        if ($request->hasFile('document_name')) {

            $file = $request->file('document_name');

            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('projectAssets'), $filename);

            Document::create([
                'document_name' => 'projectAssets/' . $filename,
                'project_id'    => $data->id,
            ]);
        }




        return response()->json(['message' => 'Data saved successfully', 'project_id' => $last_project_id]);

        // $validated = $request->validate([
        //     'project_name' => 'required|string|max:255',
        //     'client_name' => 'required|string|max:255',
        //     'membership' => 'required|string|max:255',
        //     'assign_to' => 'nullable|exists:users,id',
        //     'price' => 'required|numeric',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'user_id' => 'required|exists:users,id',
        //     'document_name' => 'required|file',
        // ]);

        
        // $project = Project::create($validated);

        // $last_project_id = session(['last_project_id' => $project->id]);

        // if ($request->hasFile('document_name')) {

        //     $file = $request->file('document_name');

        //     $filename = time() . '_' . $file->getClientOriginalName();
            
        //     $file->move(public_path('projectAssets'), $filename);

        //     Document::create([
        //         'document_name' => 'projectAssets/' . $filename,
        //         'project_id'    => $project->id,
        //     ]);
        // }

        // return redirect()->route('project.create')->with('success', 'Project created successfully.');
    }


    public function view_edit($id)
    {

        $projects = project::findorFail($id);

       return view('edit-project', compact('projects'));

    }

    // public function edit(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'project_name' => 'required|string|max:255',
    //         'client_name' => 'required|string|max:255',
    //         'assign_to' => 'required|string|max:255',
    //         'price' => 'required|numeric',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //     ]);

    //     $project = project::find($request->id);
    //     $project->update($request->all());


    //     return redirect()->route('project.create')->with('success', 'Project updated successfully.');
    // }



    public function delete($id)
    {
        $project = project::find($id);
        $project->delete();

        return redirect()->route('project.create')->with('success', 'Project deleted successfully.');
    }
    // project end

    // milestone start
    public function milestoneStore(Request $request)
    {

        $data = new Milestone();
        $data->milestone_name = $request->milestone_name;
        $data->start_date = $request->milestone_start_date;
        $data->deadline = $request->deadline;
        $data->project_id = $request->project_id;
        $data->save();

        return response()->json(['message' => 'Data saved successfully']);

        // $validated = $request->validate([
        //     'milestone_name' => 'required|string|max:255',
        //     'start_date' => 'required|date',
        //     'deadline' => 'required|date|after_or_equal:start_date',
        //     'project_id' => 'required|exists:projects,id',
        // ]);

        // Milestone::create($validated);

        // return redirect()->route('project.create')->with('success', 'Milestone created successfully.');
    }
    // milestone end


    // public function testView()
    // {
    //     return view('test');
    // }

    // public function testStore(Request $request)
    // {
    //     $data = new Test();
    //     $data->name =  $request->name;
    //     $data->email = $request->email;

    //     if ($request->hasFile('file')) {

    //         $file = $request->file('file');

    //         $filename = time() . '_' . $file->getClientOriginalName();
            
    //         $file->move(public_path('projectAssets'), $filename);

    //         $data->file = 'projectAssets/' . $filename;

    //     }

    //     $data->save();



    //      return response()->json(['message' => 'Data saved successfully']);


    // }

    public function projectId(Request $request)
    {
        $projectId = $request->input('id');

        $projectData = Project::with('user')->where('id', $projectId)->first();

        $milestoneData = Milestone::where('project_id', $projectId)->get();

        return response()->json([
            "data" => $projectData,
            "milestoneData" => $milestoneData
        ]);
    }

    public function edit(Request $request)
    {
        if($request->id){
            $data = project::find($request->id);
            $data->project_name = $request->project_name;
            $data->client_name = $request->client_name;
            $data->membership = $request->membership;
            $data->assign_to = $request->assign_to;
            $data->price = $request->price;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->user_id = $request->user_id;
            $data->save();
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

        $projectData = Project::find($projectId);

        $projectData->Delete();

        return response()->json([
            "delete" => 'delete'
        ]);
    }



    public function milestoneId(Request $request)
    {
        $milestoneId = $request->input('milestoneId');

        $milestoneData = Milestone::where('id', $milestoneId)->first();

        return response()->json([
            "milestoneDatafetch" => $milestoneData
        ]);
    }

    public function editMilestone(Request $request)
    {
        if($request->milestone_id){
            $data = Milestone::find($request->milestone_id);
            $data->milestone_name = $request->milestone_name;
            $data->start_date = $request->start_date;
            $data->deadline = $request->deadline;
            $data->project_id = $request->project_id;
            $data->save();
            return response()->json(["success" => "updated"]);
        }
        else{
            return response()->json(["error" => "error"]);
        }
    }

    public function Deletemilestone(Request $request)
    {
        $milestoneId = $request->input('delete_id');

        $milestoneData = Milestone::find($milestoneId);

        $milestoneData->Delete();

        return response()->json([
            "delete" => 'delete'
        ]);
    }


    public function list(Request $request)
    {
        $milestones = Milestone::where('project_id', $request->project_id)->get();

        return response()->json([
            'milestonesData' => $milestones
        ]);
    }


    public function projectList() {
        $projects = Project::with('user')->get();

        return response()->json([
            'success' => $projects,
        ]);
    }



}
