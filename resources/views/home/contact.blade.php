<div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>



@if (session()->has('message'))
           
<div class="alert alert-success">

<button type="button" class="close" data-bs-dismiss="alert">x</button>
   {{session()->get('message')}}


</div>

@endif

<br>



          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
            

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        


             <form id="request" class="main_form" action="{{url('contact')}}" method="post">
                  @csrf

                <div class="row">
                   <div class="col-md-12 ">
                      {{-- <input class="contactus" placeholder="Name" type="type" name="name" required>  --}}

                      <input class="contactus" placeholder="Name" type="text" name="name" value="{{ old('name') }}" >
                        @error('name')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror

                   </div>
                   <div class="col-md-12">
                      {{-- <input class="contactus" placeholder="Email" type="email" name="email" required>  --}}

                      <input class="contactus" placeholder="Email" type="email" name="email" value="{{ old('email') }}" >
@error('email')
    <small class="text-danger">{{ $message }}</small>
@enderror


                   </div>
                   <div class="col-md-12">
                      {{-- <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>--}}
                      <input class="contactus" placeholder="Phone Number" type="number" name="phone" value="{{ old('phone') }}" >
                      @error('phone')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                      


                   </div>
                   <div class="col-md-12">
                      {{-- <textarea class="textarea" placeholder="Message" type="type" name="message">Message</textarea> --}}

                      <textarea class="textarea" placeholder="Message" name="message" >{{ old('message') }}</textarea>
                      @error('message')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                      

                   </div>
                   <div class="col-md-12">
                      <button type="submit" class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


