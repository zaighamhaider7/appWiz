<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;

class LeadsController extends Controller
{
    public function LeadsView(){
        $leadsData = Leads::all();
        return view('client.leads', compact('leadsData'));
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

        return redirect()->back()->with('AddLeads', 'Lead added successfully.');
    }
}
