<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // لاستخدام Auth للمستخدم المسجل دخوله
use Illuminate\Support\Facades\Validator;  // لاستخدام Validator للتحقق من صحة البيانات

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;



class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view("home.room_details", compact('room'));
    }

    public function add_booking(Request $request, $id)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
            'phone' => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'guests' => 'required|integer|min:1|max:20',
            'special_requests' => 'nullable|string|max:1000',
            'payment_method' => 'required|in:cash_on_delivery,online_payment',
        ]);

        // إنشاء كائن جديد لحجز الغرفة
        $data = new Booking;

        // تعبئة بيانات الحجز
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guests = $request->guests;
        $data->special_requests = $request->special_requests;
        $data->payment_method = $request->payment_method;
        $data->user_id = Auth::id(); // ربط الحجز بالمستخدم الحالي

        // التحقق من أن الغرفة غير محجوزة في التاريخ المحدد
        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $request->endDate)
            ->where('end_date', '>=', $request->startDate)
            ->exists();

        // إذا كانت الغرفة محجوزة في التاريخ المطلوب
        if ($isBooked) {
            return redirect()->back()->with('message', 'Room is already booked. Please try a different date.');
        } else {
            // إذا لم تكن الغرفة محجوزة، حفظ الحجز
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->back()->with('message', 'Booking Successful!');
        }
    }

    public function contact(Request $request)
    {
        // التحقق من صحة البيانات المدخلة في نموذج الاتصال
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:7,15',
            'message' => 'required|string|min:10',
        ]);

        // إنشاء رسالة جديدة في نموذج الاتصال
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('message','Message Sent Successfully!');
    }

    public function our_rooms()
    {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallary()
    {
        $gallary = Gallary::all();
        return view('home.hotel_gallary', compact('gallary'));
    }

    public function contact_us()
    {
        return view('home.contact_us');
    }




// للبروفايل

//     public function profile()
// {
//     $user = Auth::user();

//     if (!$user instanceof \App\Models\User) {
//         return back()    if (!$user) {
//         return redirect()->route('login');
//     }

//     $bookings = Booking::where('user_id', $user->id)
//                        ->with(['room', 'user'])
//                        ->get();

//                     //    dd($bookings);

//     return view('profile', compact('bookings', 'user'));
// }
// }



public function profile()
{
    $user = Auth::user();

    // التحقق من وجود المستخدم
    if (!$user) {
        return redirect()->route('login');
    }

    // التحقق من نوع الكائن
    if (!$user instanceof \App\Models\User) {
        return back();
    }

    $bookings = Booking::where('user_id', $user->id)
                       ->with(['room', 'user'])
                       ->get();

    return view('profile', compact('bookings', 'user'));
}






// بعد التحديث


public function show()
{
    $user = Auth::user();
    $bookings = $user->bookings()->with('room')->latest()->get();
    
    return view('profile', compact('user', 'bookings'));
}

// تحديث بيانات البروفايل
public function update(Request $request)
{
    $user = Auth::user();
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'phone' => 'required|string|max:20',
 

    ]);

    // تحديث بيانات المستخدم
    $user->update($request->only('name', 'email', 'phone'));
    
    // تحديث جميع حجوزات المستخدم لتعكس التغييرات
    $user->bookings()->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
      
    ]);
    
    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}




// صورة


public function updateImage(Request $request)
{
    $request->validate([
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $user = Auth::user();
    if ($user && $request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        $user->profile_image = $imagePath;
        if ($user instanceof \App\Models\User) {
            $user->save();
        } else {
            return back()->withErrors('User instance is invalid.');
        }
    }

    return back()->with('success', 'Profile image updated successfully!');
}












}
