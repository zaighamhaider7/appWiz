<?php

    namespace App\Helpers;

    use App\Models\activityLog;
    use Illuminate\Support\Facades\Auth;

    class ActivityLogger
    {
        public static function log(string $action, string $description): void
        {
            activityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description
            ]);
        }
    }

?>