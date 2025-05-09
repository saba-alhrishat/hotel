<!DOCTYPE html>
<html lang="en">
   <head>
   
<base href="/public">

@include('home.css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<style type="text/css">
label{
   display: inline-block;
   width: 200px;
   
}

input{
   width:100%
}
 </style>


   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
     @include('home.header')
      </header>



      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p style="color:gray">Step into a world of comfort and style. Our rooms are elegantly furnished, equipped with premium amenities, and designed to offer a peaceful retreat after a long day
                    </p>
                 </div>
              </div>
           </div>
              
           
           <div class="row">
    


              <div class="col-md-8">
                 <div id="serv_hover"  class="room">
                    <div style="padding: 20px" class="room_img">
                       <figure><img style="height: 300px; width: 800px" src="/room/{{$room->image}}" alt="#"/></figure>
                    </div>
                    <div class="bed_room">
                       <h2>{{$room->room_title}}</h2>
                       <p style="padding: 12px">{{$room->description}}</p>
                       <h4 style="padding: 12px"> Free Wifi : {{$room->wifi}}</h4>

                       <h4 style="padding: 12px"> Room Type : {{$room->room_type}}</h4>

                       <h3 style="padding: 12px"> Price : {{$room->price}} JD</h3>



    
    
                    </div>
                 </div>
              </div>
    


           
              <div class="col-md-4">

             <h1 style="font-size: 40px!important;">Book Room</h1>

             <div>
               @if (session()->has('message'))
               

               <div class="alert alert-success">
               
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  {{session()->get('message')}}
               
                  

                  
               </div>
               @endif   
            </div>
                
         

             @if($errors)
             @foreach($errors ->all() as $error)
            
             <li style="color: red">{{$error}}</li>





             @endforeach
             @endif

             <form action="{{url('add_booking',$room->id )}}" method="POST">
               @csrf
            <div>
               <label>Name </label>
               <input type="text" name="name"
               @if(Auth::id())
                value="{{Auth::user()->name}}"
                @endif
                >                                                                                                                                                                                                                                                                                                                                
            </div>


            <div>
               <label>Email</label>
               <input type="text" name="email"
               @if(Auth::id())
                value="{{Auth::user()->email}}"
                @endif
               >
            </div>

            <div>
               <label>Phone </label>
               <input type="text" name="phone"
               @if(Auth::id())
                value="{{Auth::user()->phone}}"
                @endif
               >
            </div>


            <div>
               <label>Start Date </label>
               <input type="date" name="startDate" id="startDate">
            </div>

            <div>
               <label>End Date </label>
               <input type="date" name="endDate" id="endDate"> 
            </div>
<br>

<!-- Number of Guests -->
<div>
   <label>Number of Guests </label>
   <input type="number" name="guests" placeholder="Number of Guests" min="1" max="20" value="{{ old('guests') }}">
   @error('guests')
       <div style="color:red;">{{ $message }}</div>
   @enderror
</div>

<!-- Special Requests -->
<div>
   <br>
   <textarea name="special_requests" placeholder="Special Requests">{{ old('special_requests') }}</textarea>
   @error('special_requests')
       <div style="color:red;">{{ $message }}</div>
   @enderror
</div>

<!-- Payment Method -->
<div>
   <br>
   <select name="payment_method">
      <option value="">Select Payment Method</option> 
      <option value="cash_on_delivery" {{ old('payment_method') == 'cash_on_delivery' ? 'selected' : '' }}>Cash on Delivery</option>
      <option value="online_payment" {{ old('payment_method') == 'online_payment' ? 'selected' : '' }}>Online Payment</option>
   </select>
   @error('payment_method')
       <div style="color:red;">{{ $message }}</div>
   @enderror
</div>


            <div style="padding-top:20px;">
               <input type="submit" value="Book Room" class="btn btn-primary" style="background-color: #DB6574; border-color: #DB6574;"> 
            </div>
             </form>
              </div>
             



           </div>
        </div>
     </div>















      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
    
      <!-- end contact -->
      <!--  footer -->

     @include('home.footer')

     
   
   
   <script type="text/javascript">

    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if (month < 10)
            month = '0' + month.toString();

        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);
    });
</script>







      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



   </body>
</html>