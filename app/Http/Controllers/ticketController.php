<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\ticket;

class ticketController extends Controller
{
    public function tickView(){
        $projectData = project::all();

        //$currentUser = auth()->user()->id;

        // $ticketData = Ticket::where('user_id', $currentUser)->with('project', 'user')->get();

        $ticketData = ticket::with('project', 'user')->get();

        return view('admin.tickets', compact('projectData', 'ticketData'));
    }

    public function tickStore(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_id' => 'required|integer',
            'priority' => 'required|string|in:Low,Medium,High',
            'description' => 'required|string',
            'attachments' => 'nullable|file|max:2048',
            'user_id' => 'required|integer',
        ]);

        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/ticket_attachments'), $filename);
            $validated['attachments'] = 'assets/ticket_attachments/' . $filename;
        }

        ticket::create($validated);

        return redirect()->route('ticket.view')->with('success', 'Ticket created successfully.');
    }

    public function ticketStatusUpdate(Request $request, $id){
        $ticket = ticket::findOrFail($id);
        $ticket->status = $request->input('status');

        $ticket->save();

        return redirect()->back()->with('UpdateTicketStatus', 'Ticket status updated successfully.');
    }
}
