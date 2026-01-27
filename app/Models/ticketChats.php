<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticketChats extends Model
{
    protected $table ='ticket_chats';
    protected $fillable = [
        'ticket_id',
        'sender_id',
        'message'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function likes()
    {
        return $this->hasMany(TicketChatsLike::class, 'chat_id', 'id');
    }
}
