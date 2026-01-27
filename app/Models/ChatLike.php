<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatLike extends Model
{
   protected $fillable = ['chat_id', 'user_id'];
}
