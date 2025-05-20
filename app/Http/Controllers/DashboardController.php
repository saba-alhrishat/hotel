<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function index()
{
    // إحصائيات أساسية
    $newUsersCount = User::whereDate('created_at', today())->count();
    $totalUsersCount = User::count();
    $newBookingsCount = Booking::whereDate('created_at', today())->count();
    $totalBookingsCount = Booking::count();

    // بيانات آخر 7 أيام (للمخطط الخطي)
    $userCounts = User::where('created_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get([
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        ]);

    $bookingCounts = Booking::where('created_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get([
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        ]);

    return view('admin.body', compact(
        'newUsersCount',
        'totalUsersCount',
        'newBookingsCount',
        'totalBookingsCount',
        'userCounts',
        'bookingCounts'
    ));
    
}
}