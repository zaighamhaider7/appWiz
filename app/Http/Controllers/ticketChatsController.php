<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticketChats;
use App\Models\TicketChatsLike;


class ticketChatsController extends Controller
{

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();


        $file->move(public_path('assets/chat_images'), $filename);

        return response()->json([
            'url' => url('assets/chat_images/' . $filename)
        ]);
    }

    public function ticketChat(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required',
            'sender_id' => 'required',
            'message' => 'required|string',
        ]);

        ticketChats::create([
            'ticket_id' => $request->ticket_id,
            'sender_id' => $request->sender_id,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function getTicketChats($ticketId)
    {
        $chats = ticketChats::where('ticket_id', $ticketId)
            ->with('sender') 
            ->withCount('likes')
            ->orderBy('created_at', 'asc')
            ->get();


        return response()->json([
            'chats' => $chats,
        ]);
    }

    public function toggleLike($chatId)
    {
        $userId = auth()->id();

        $like = TicketChatsLike::where('chat_id', $chatId)->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            TicketChatsLike::create(['chat_id' => $chatId, 'user_id' => $userId]);
            $liked = true;
        }

        $count = TicketChatsLike::where('chat_id', $chatId)->count();

        return response()->json([
            'liked' => $liked,
            'count' => $count,
        ]);
    }
}
