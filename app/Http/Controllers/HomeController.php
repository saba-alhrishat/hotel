<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $request->validate([
           
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

         $data = new Booking;

       $data->room_id = $id;

       $data->name = $request->name;

       $data->email = $request->email;

       $data->phone = $request->phone;

       $startDate = $request->startDate;

       $endDate = $request->endDate;

       $isBooked = Booking::where('room_id', $id)
           ->where('start_date', '<=' , $endDate)
           ->where('end_date', '>=', $startDate)
           ->exists();

         if($isBooked) {

            return redirect()->back()->with('message', 'Room is already booked please try defferent date.');

         }
         else
         {
            
       $data->start_date = $request->startDate;

       $data->end_date = $request->endDate;

       $data->save();

       return redirect()->back()->with('message', 'Booking Successful!');
         }

        }



        public function contact(Request $request)
        {



            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits_between:7,15',
                'message' => 'required|string|min:10',
            ]);
            
          $contact = new Contact;

          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->phone = $request->phone;
          $contact->message = $request->message;

          $contact->save();

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
}

