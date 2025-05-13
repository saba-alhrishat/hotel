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


    if(Auth::id())
    {
        $usertype = Auth()->user()->usertype;

        if($usertype == 'user')
        {
           $room = Room::all();

           $gallary = Gallary::all();


            return view('home.index', compact('room','gallary'));
        }
       else if($usertype == 'admin')
        {
            return view('admin.index');
        }
        else 
        {
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

$data =new Room;
$data->room_title = $request->title;

$data->description = $request->description;

$data->price = $request->price;

$data->wifi = $request->wifi;

$data->room_type = $request->type;

$image = $request->image;

if($image)
{
    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->image->move('room',$imagename);

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
    
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('room',$imagename);
    
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

public function bookings()
{
    $data = Booking::with('room')  // تحميل العلاقة مسبقاً لتحسين الأداء
                 ->orderBy('created_at', 'desc')
                 ->paginate(5);  // 10 حجوزات لكل صفحة
    
    return view('admin.bookings', compact('data'));
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
    $gallary= Gallary::all();
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


// للبار


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
    $data = User::orderBy('created_at', 'desc')->paginate(5); // 10 مستخدمين لكل صفحة
    return view('admin.new_users', compact('data'));
}


public function send_mail($id)
{
    
        $data = Contact::findOrFail($id);
    
        return view('admin.send_mail' , compact('data'));
    
    }

    public function mail(Request $request,$id)
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
        $user = \App\Models\User::findOrFail($id);
    
        if ($user) {
            $user->usertype = $request->input('usertype');
            if ($user instanceof \App\Models\User) {
                if ($user instanceof \App\Models\User) {
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
        'email' => 'required|email|unique:users,email,'.$id,
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


// للاحصائيات







// public function dashboard()
// {
//     $newUser = User::count();
//     $newBookings = Booking::count();
//     // $newMessages = Message::count(); // غيّريها حسب اسم الموديل عندك
//     $newRooms = Room::count();

//     return view('admin.body', compact('newUser', 'newBookings', 'newRooms'));
// }






    // FLUTTER*********************************************



//     public function api_rooms()
// {
//     $rooms = Room::all();

//     foreach ($rooms as $room) {
//         $room->image = asset('room/' . $room->image);
//     }

//     return response()->json($rooms);
// }


public function api_rooms()
{
    $rooms = Room::all();

    foreach ($rooms as $room) {
        // التأكد من تحويل المسار بشكل صحيح ليصبح رابطًا صالحًا
        $room->image = asset('room/' . $room->image);
    }

    return response()->json($rooms);
}




}
