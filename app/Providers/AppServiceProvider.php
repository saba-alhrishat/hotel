<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\Room;

use App\Models\Booking;


use App\Models\Contact;
use App\Models\User;


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
          view()->composer('admin.body', function($view) {
        $view->with([
            'newUsersCount' => User::whereDate('created_at', today())->count(),
            'totalUsersCount' => User::count(),
            'newBookingsCount' => Booking::whereDate('created_at', today())->count(),
            'totalBookingsCount' => Booking::count(),
            'newMessagesCount' => Contact::whereDate('created_at', today())->count(), // إذا كان لديك نموذج
            'newRoomsCount' => Room::whereDate('created_at', today())->count() // إذا كان لديك نموذج
        ]);
    });
    }
}
