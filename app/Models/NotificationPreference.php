<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationPreference extends Model
{
    protected $table = 'table_notificationpreference';
    protected $fillable = [
        'user_id',
        'notification_type',
        'is_enabled',
    ];
}
