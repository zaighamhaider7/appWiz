<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\ticket;
use App\Helpers\ActivityLogger;
use App\Helpers\NotificationLogger;

class ticketController extends Controller
{
    public function tickView() {
        $projectData = auth()->user()->assignedProjects()->get();

        $currentUser = auth()->user();

        if($currentUser->role_id == 1) {
            $ticketData = ticket::with('project', 'user')->get();
            $view = 'admin.tickets'; 
        } else {
            $ticketData = ticket::where('user_id', $currentUser->id)->with('project', 'user')->get();
            $view = 'user.tickets';  
        }

        return view($view, compact('projectData', 'ticketData'));
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

        NotificationLogger::notify(
            2, 
            'ticket_received', 
            'New ticket created: ' . $validated['title'],
            'general'
        );

        ticket::create($validated);

        ActivityLogger::log('Ticket Created', 'A new ticket "' . $validated['title'] . '" was created by ' . auth()->user()->name . '.');

        return redirect()->route('ticket.view')->with('success', 'Ticket created successfully.');
    }

    public function ticketStatusUpdate(Request $request, $id){
        $ticket = ticket::findOrFail($id);
        $ticket->status = $request->input('status');

        $ticket->save();

        return redirect()->back()->with('UpdateTicketStatus', 'Ticket status updated successfully.');
    }
}
