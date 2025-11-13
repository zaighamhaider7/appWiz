<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskChat extends Model
{
    protected $fillable = [
        'task_id',
        'sender_id',
        'receiver_id',
        'message'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function likes()
    {
        return $this->hasMany(ChatLike::class, 'chat_id', 'id');
    }

}
