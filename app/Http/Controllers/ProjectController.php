<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Document;
use App\Models\User;

class ProjectController extends Controller
{
    public function create()
    {
        $userId = Auth::id();

        $projects = project::all();

        $users = User::all();



        return view('project', compact('projects', 'users', 'userId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'membership' => 'required|string|max:255',
            'assign_to' => 'nullable|exists:users,id',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required|exists:users,id',
            'document_name' => 'required|file',
        ]);

        
        $project = Project::create($validated);

        if ($request->hasFile('document_name')) {

            $file = $request->file('document_name');

            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('projectAssets'), $filename);

            Document::create([
                'document_name' => 'projectAssets/' . $filename,
                'project_id'    => $project->id,
            ]);
        }

        return redirect()->route('project.create')->with('success', 'Project created successfully.');
    }


    public function view_edit($id)
    {

        $projects = project::findorFail($id);

       return view('edit-project', compact('projects'));

    }

    public function edit(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'assign_to' => 'required|string|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project = project::find($request->id);
        $project->update($request->all());

        return redirect()->route('project.create')->with('success', 'Project updated successfully.');
    }



    public function delete($id)
    {
        $project = project::find($id);
        $project->delete();

        return redirect()->route('project.create')->with('success', 'Project deleted successfully.');
    }
}
