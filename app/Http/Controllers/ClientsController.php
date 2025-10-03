<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\assignTo;
use Illuminate\Support\Facades\Hash;


class ClientsController extends Controller
{
    
    // public function ClientView()
    // {
    //     $clientData = User::where('name', '!=', 'Admin')->get();

    //     $latestProjectByClient = [];

    //     foreach ($clientData as $client) {
    //         $latestProject = Project::where('client_name', $client->name)->latest()->first();
    //         $latestProjectByClient[$client->id] = $latestProject;
    //     }

    //     return view('client.clients', compact('clientData', 'latestProjectByClient'));
    // }

    public function ClientView()
    {
        $clientData = User::where('name', '!=', 'Admin')->get();

        $latestProjectByClient = [];

        foreach ($clientData as $client) {
            $latestProject = Project::where('client_name', $client->name)->latest()->first();
            $latestProjectByClient[$client->id] = $latestProject;
        }

        $singleClientData = null;
        $clientProjects = null;
        $totalProjects = null;
        $totalProjectPrice = null;

        return view('client.clients', compact('clientData', 'latestProjectByClient', 'singleClientData', 'clientProjects', 'totalProjects', 'totalProjectPrice'));
    }


    public function ClientStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'business_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
            'leads' => 'nullable|string|max:255',
            'membership' => 'nullable|string|max:100',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'business_name' => $validated['business_name'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'status' => $validated['status'],
            'leads' => $validated['leads'],
            'membership' => $validated['membership'],
        ]);

        return redirect()->back()->with('AddClient', 'Client added successfully.');

    }

    public function ClientDelete($id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        return redirect()->back()->with('DeleteClient', 'Client deleted successfully.');
    }

    // public function ClientDetails($id)
    // {
    //     $singleClientData = User::findOrFail($id);

    //     return view('client.clients', compact('singleClientData'));
    // }

    public function ClientDetails($id)
    {
        $clientData = User::where('name', '!=', 'Admin')->get();

        $latestProjectByClient = [];

        foreach ($clientData as $client) {
            $latestProject = Project::where('client_name', $client->name)->latest()->first();
            $latestProjectByClient[$client->id] = $latestProject;
        }

        $singleClientData = User::findOrFail($id);

        $clientProjects = Project::where('client_name', $singleClientData->name)->get();

        $totalProjects = $clientProjects->count();

        $totalProjectPrice = Project::where('client_name', $singleClientData->name)->sum('price');

        $assignedUsers = AssignTo::with(['user', 'project'])->get();

        return view('client.clients', compact('clientData', 'latestProjectByClient', 'singleClientData', 'clientProjects', 'assignedUsers', 'totalProjects', 'totalProjectPrice'));
    }
}

