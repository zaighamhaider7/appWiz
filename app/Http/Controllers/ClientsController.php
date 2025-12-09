<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\project;
use App\Models\assignTo;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ActivityLogger;
use App\Models\ActivityLog;


class ClientsController extends Controller
{

    public function ClientView()
    {
        $clientData = User::where('name', '!=', 'Admin')->get();

        $latestProjectByClient = [];

        foreach ($clientData as $client) {
            $latestProject = project::where('client_name', $client->name)->latest()->first();
            $latestProjectByClient[$client->id] = $latestProject;
        }

        $singleClientData = null;
        $clientProjects = null;
        $totalProjects = null;
        $totalProjectPrice = null;
        $activity_logs = null;

        return view('client.clients', compact('clientData', 'latestProjectByClient', 'singleClientData', 'clientProjects', 'totalProjects', 'totalProjectPrice', 'activity_logs'));
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
            'status' => 'required|in:Active,In Active',
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

        ActivityLogger::log('New Client Added', 'A new client "' . $validated['name'] . '" was successfully added by ' . auth()->user()->name . '.');

        return redirect()->back()->with('AddClient', 'Client added successfully.');

    }

    public function ClientDelete($id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        ActivityLogger::log('Client Deleted', 'The client "' . $client->name . '" was deleted by ' . auth()->user()->name . '.');

        return redirect()->back()->with('DeleteClient', 'Client deleted successfully.');
    }

    public function ClientDetails($id)
    {
        $clientData = User::where('name', '!=', 'Admin')->get();

        $latestProjectByClient = [];

        foreach ($clientData as $client) {
            $latestProject = project::where('client_name', $client->name)->latest()->first();
            $latestProjectByClient[$client->id] = $latestProject;
        }

        $singleClientData = User::findOrFail($id);

        // $activity_logs = ActivityLog::where('user_id', $singleClientData->id)->get();

        $clientProjects = project::where('client_name', $singleClientData->name)->get();

        $totalProjects = $clientProjects->count();

        $totalProjectPrice = project::where('client_name', $singleClientData->name)->sum('price');

        $assignedUsers = AssignTo::with(['user', 'project'])->get();

        $activity_logs = ActivityLog::where('user_id', auth()->id())->latest()->get();

        return view('client.clients', compact('clientData', 'latestProjectByClient', 'singleClientData', 'clientProjects', 'assignedUsers', 'totalProjects', 'totalProjectPrice', 'activity_logs'));
    }
}

