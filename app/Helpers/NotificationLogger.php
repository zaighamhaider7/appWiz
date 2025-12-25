<?php

namespace App\Helpers;

use App\Models\Notification;
use App\Models\NotificationPreference;

class NotificationLogger
{
    public static function notify(int $userId, string $type, string $message): void
    {
        $allowed = NotificationPreference::where('user_id', $userId)
            ->where('notification_type', $type)
            ->value('is_enabled');

        if ($allowed === null || $allowed == 1) {
            Notification::create([
                'user_id' => $userId,
                'type'    => $type,
                'message' => $message,
                'is_read' => 0
            ]);
        }
    }
}
