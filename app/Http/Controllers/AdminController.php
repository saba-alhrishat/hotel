<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Gallary;

use App\Models\Contact;
use App\Models\User;

use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Hash;





class AdminController extends Controller
{
    public function index()

    {


        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();

                $gallary = Gallary::all();


                return view('home.index', compact('room', 'gallary'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();

        $gallary = Gallary::all();

        return View('home.index', compact('room', 'gallary'));
    }


    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {

        $data = new Room;
        $data->room_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->wifi = $request->wifi;

        $data->room_type = $request->type;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }



    // public function viwe_room()
    // {
    //     $data = Room::all();
    //     return view('admin.viwe_room' , compact('data'));
    // }



    // للبار



    public function viwe_room()
    {
        $data = Room::orderBy('id', 'desc')->paginate(5);
        return view('admin.viwe_room', compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::findOrFail($id);

        $data->delete();

        return redirect()->back();
    }


    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }


    public function edit_room(Request $request, $id)
    {
        $data = Room::findOrFail($id);

        $data->room_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->wifi = $request->wifi;

        $data->room_type = $request->type;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

    // public function bookings()
    // {
    //     $data =Booking::all();

    //     return view('admin.bookings', compact('data'));
    // }


    // للبار

    // public function bookings()
    // {
    //     $data = Booking::with('room')  // تحميل العلاقة مسبقاً لتحسين الأداء
    //                  ->orderBy('created_at', 'desc')
    //                  ->paginate(5);  // 10 حجوزات لكل صفحة

    //     return view('admin.bookings', compact('data'));
    // }



    // مع الشارت




    public function bookings()
    {
        $data = Booking::with('room')->orderBy('created_at', 'desc')->paginate(5);
        $newBookingsCount = Booking::whereDate('created_at', today())->count();
        $totalBookingsCount = Booking::count();

        return view('admin.bookings', compact('data', 'newBookingsCount', 'totalBookingsCount'));
    }




    public function delete_booking($id)
    {
        $data = Booking::findOrFail($id);


        $data->delete();

        return redirect()->back();
    }

    public function approve_book($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'approve';

        $booking->save();

        return redirect()->back();
    }

    public function reject_book($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'rejected';

        $booking->save();

        return redirect()->back();
    }


    public function viwe_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }

    public function upload_gallary(Request $request)
    {
        // $data = new Gallary();
        // $image = $request->image;

        // if ($image){
        //     $imagename = time() . '.' . $image->getClientOriginalExtension();
        //     $request->image->move('gallary', $imagename);
        //     $data->image = $imagename;
        //     $data->save();
        //     return redirect()->back();


        // }








        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('gallary', $imagename);

        $gallary = new Gallary;
        $gallary->image = $imagename;
        $gallary->save();

        return redirect()->back()->with('message', 'Image uploaded successfully!');
    }


    public function delete_gallary($id)
    {

        $data = Gallary::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }



    // public function all_messages()
    // {
    //     $data = Contact::all();

    //     return view('admin.all_message' , compact('data'));

    // }


    // لبار الارقام 


    public function all_messages()
    {
        $data = Contact::orderBy('id', 'desc')->paginate(5);
        return view('admin.all_message', compact('data'));
    }


    // public function new_users()
    // {

    //     $data = User::all();  
    //       // $data = Contact::all();

    //     return view('admin.new_users' , compact('data'));
    // }

    // للبار

    public function new_users()
    {
        $data = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.new_users', compact('data'));
    }







    public function send_mail($id)
    {

        $data = Contact::findOrFail($id);

        return view('admin.send_mail', compact('data'));
    }

    public function mail(Request $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,

            'body' => $request->body,

            'action_text' => $request->action_text,


            'action_url' => $request->action_url,


            'endline' => $request->endline,

        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }




    // رول




    public function changeUsertype(Request $request, $id)
    {
        // $user = \App\Models\User::findOrFail($id);
        $user = User::findOrFail($id);

        if ($user) {
            $user->usertype = $request->input('usertype');
            // if ($user instanceof \App\Models\User) {
            if ($user instanceof User) {
                // if ($user instanceof \App\Models\User) {
                if ($user instanceof User) {
                    $user->save();
                } else {
                    return redirect()->back()->with('error', 'User instance not found.');
                }
            } else {
                return redirect()->back()->with('error', 'User instance not found.');
            }

            return redirect()->back()->with('success', 'User type updated successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }






    // لحذف اليوزر 





    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete(); // Soft delete
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }



    // تعديل بيانات اليوزر 


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));


        if (auth()->user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to perform this action');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'usertype' => 'required|in:user,admin'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'usertype' => $request->usertype
        ]);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    // ********************************************************



    // للسيرش


    // viwe_room
    public function showRooms(Request $request)
    {
        $search = $request->input('search');

        $data = Room::when($search, function ($query, $search) {
            return $query->where('room_title', 'like', "%$search%")
                ->orWhere('room_type', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%")
                ->orWhere('wifi', 'like', "%$search%");
        })->paginate(5);

        return view('admin.viwe_room', compact('data'));
    }



    // bookings

    public function show_booking(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $data = Booking::with('room')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('start_date', 'like', '%' . $search . '%')
                ->orWhere('end_date', 'like', '%' . $search . '%')
                ->orWhere('payment_method', 'like', '%' . $search . '%')
                ->orWhereHas('room', function ($query) use ($search) {
                    $query->where('room_title', 'like', '%' . $search . '%');
                })
                ->paginate(10);
        } else {
            $data = Booking::with('room')->paginate(10);
        }

        return view('admin.bookings', compact('data'));
    }



    // all_messages


    public function show_messages(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $data = Contact::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('message', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $data = Contact::paginate(10);
        }

        return view('admin.all_message', compact('data'));
    }


    // new_users
    public function searchUser(Request $request)
    {
        $query = $request->input('search'); // بدل query إلى search

        $data = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->orWhere('usertype', 'like', "%$query%")
            ->paginate(10);

        return view('admin.new_users', compact('data'));
    }






    // FLUTTER*********************************************



    public function api_rooms()
    {
        $rooms = Room::all();

        $rooms->transform(function ($room) {
            $room->image = url('room/' . $room->image);
            return $room;
        });

        return response()->json($rooms);
    }
















    public function api_sign_in(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // If user not found, return error response
            return response()->json([
                'success' => false,
                'message' => 'These credentials do not match our records.',
            ], 401); // 401 Unauthorized
        }

        // Compare the given password with the hashed password in the database
        if (Hash::check($request->password, $user->password)) {
            // If the password matches, return user data
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    // Add any other fields you need to return
                ],
            ], 200); // 200 OK
        } else {
            // If password does not match, return error response
            return response()->json([
                'success' => false,
                'message' => 'These credentials do not match our records.',
            ], 401); // 401 Unauthorized
        }
    }








}
