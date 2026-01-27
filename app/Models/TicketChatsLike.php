<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketChatsLike extends Model
{
    protected $table = 'ticketchat_like';
    protected $fillable = ['chat_id', 'user_id'];
}
