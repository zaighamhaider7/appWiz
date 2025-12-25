<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;
use App\Helpers\ActivityLogger;
use App\Models\ActivityLog;

class LeadsController extends Controller
{
    public function LeadsView(){
        $leadsData = Leads::all();
        return view('admin.Leads', compact('leadsData'));
    }

    public function LeadsStore(Request $request){
        $validated = $request->validate([
            'lead_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:table_leads',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'lead_source' => 'required|string|max:255',
            'lead_status' => 'required|string|max:255',
            'memberships' => 'required|string|max:255',
        ]);

        Leads::create([
            'lead_name' => $validated['lead_name'],
            'business_name' => $validated['business_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'status' => $validated['status'],
            'lead_source' => $validated['lead_source'],
            'lead_status' => $validated['lead_status'],
            'memberships' => $validated['memberships'],
        ]);

        // ActivityLogger::log('New Lead Added', 'A new lead was succesfully added by ' . auth()->user()->name . '.');

        return redirect()->back()->with('AddLeads', 'Lead added successfully');
    }

    public function LeadsUpdate(request $request, $id){
        $lead = Leads::findOrFail($id);
        $lead->lead_status = $request->input('lead_status');
        $lead->save();

        // ActivityLogger::log('Lead Status Updated', 'The lead status for "' . $lead->lead_name . '" was updated to "' . $lead->lead_status . '" by ' . auth()->user()->name . '.');

        return redirect()->back()->with('UpdateLead', 'Lead status updated successfully.');
    }
    public function LeadsDelete($id){
        $lead = Leads::findOrFail($id);
        $lead->delete();

        // ActivityLogger::log('Lead Deleted', 'The lead "' . $lead->lead_name . '" was deleted by ' . auth()->user()->name . '.');

        return redirect()->back()->with('DeleteLead', 'Lead deleted successfully.');
    }
}
