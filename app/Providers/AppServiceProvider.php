<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View::composer('layouts.header', function ($view) {
                if(auth()->check()) {
                    $notifications = Notification::where('user_id', auth()->id())
                        ->where('is_read', 0)
                        ->latest()
                        ->take(10)
                        ->get();

                    $unreadCount = Notification::where('user_id', auth()->id())
                        ->where('is_read', 0)
                        ->count();

                    $view->with(compact('notifications', 'unreadCount'));
                }
            });
    }
}
