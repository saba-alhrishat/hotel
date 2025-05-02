

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
 
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
        <li class="active">
          <a href="{{url('/')}}"> 
              <i class="fas fa-home"></i> Home 
          </a>
      </li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                
                <i class="fas fa-bed"></i>Hotel Rooms </a>


                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">



                  <li><a href="{{url('create_room')}}"><i class="fas fa-plus-circle mr-2"></i>Add Rooms</a></li>
                
                  <li><a href="{{url('viwe_room')}}"><i class="fas fa-list mr-2"></i>View Rooms</a></li>

                </ul>
              </li>
             

              <li>
                <a href="{{url('bookings')}}"> <i class="fas fa-calendar-check"></i>Bookings </a>
              </li>
             

              
              <li>
                <a href="{{url('viwe_gallary')}}"> <i class="fas fa-images"></i>Gallary </a>
              </li>



              <li>
                <a href="{{url('all_messages')}}"> <i class="fas fa-envelope"></i>Message </a>
              </li>


      </ul>
    </nav>  




