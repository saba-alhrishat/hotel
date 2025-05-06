{{-- <!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')


<style type="text/css">
       
       .table_deg{
           
        border: 1px solid #DB6574;
        box-shadow: 0 2px 10px #DB6574;
         margin: auto;
           width: 80%;
           text-align: center;
           margin-top: 40px;

       }

       .th_deg{
           background-color: #2d3035;
           padding: 8px;

       }
       
       tr{
           border: 1px solid #DB6574;
       }

       td
       {
           padding: 10px
       }



    </style>





  </head>

  <body>
   @include('admin.header')


   @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">






            <table class="table_deg">

                <tr>
                    <th class="th_deg">Room_id</th>
                    <th class="th_deg">Customer Name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">phone</th>
                    <th class="th_deg">Arrival Date</th>
                    <th class="th_deg">Leaving Date</th>
                    <th class="th_deg">Status</th>
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th>Guests</th>
                    <th>Special Requests</th>
                    <th>Payment Method</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Status Update</th>

                </tr>
              @foreach ($data as $data )
                  
              
               <tr>
                <td>  {{$data->room_id}} </td>
                <td>  {{$data->name}} </td>
                <td>  {{$data->email}} </td>
                <td>  {{$data->phone}} </td>
                <td>  {{$data->start_date}} </td>
                <td>  {{$data->end_date}} </td>
                <td>{{ $data->guests }}</td>
                <td>{{ $data->special_requests }}</td>
                <td>{{ $data->payment_method }}</td>
                <td> 
                    
                
                @if($data->status == 'approve')
                <span style="color:skyblue;">Approved</span>
                @endif


                @if($data->status == 'rejected')
                <span style="color:red;">Rejected</span>
               
                @endif

                @if($data->status == 'pending')
                <span style="color:yellow;">Pending</span>
                
               
                @endif

                </td>
                <td>  {{$data->room->room_title}} </td>
                <td>  {{$data->room->price}} </td>
                <td>  
                <img src="/room/{{$data->room->image}}" alt="" style="width: 200!important" >
                </td>

                <td>  

                    <a href="#" class="btn btn-danger delete-button" data-id="{{$data->id}}">Delete</a>
                </td>

                <td> 

                   <span style=" padding-bottom: 10px;">
                    <a href="{{url('approve_book',$data->id)}}" class="btn btn-success">Approve</a>    
    
                </span>
                    <a href="{{url('reject_book',$data->id)}}" class="btn btn-warning">Rejected</a>    
                </td>


               </tr>
              @endforeach

            </table>






          </div>
        </div>
      </div>
      
        @include('admin.footer')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.delete-button');
        
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const bookingId = this.getAttribute('data-id');
        
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to undo this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/delete_booking/" + bookingId;
                            }
                        });
                    });
                });
            });
        </script>
        

  </body>
</html>


 --}}











 <!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')

<style type="text/css">
       .table-container {
           width: 100%;
           overflow-x: auto;
           margin-top: 40px;
           border: 1px solid #DB6574;
        box-shadow: 0 2px 10px #DB6574;


       }

       .table_deg {
           width: 100%;
           border-collapse: collapse;
           min-width: 1000px; /* الحد الأدنى لعرض الجدول */
           
       }

       .table_deg th, .table_deg td {
           padding: 8px 12px;
           text-align: center;
           white-space: nowrap;
           border: 1px solid #DB6574;
           background-color: #2d3035;
           color: white;

       }

       .table_deg th {
           background-color: #2d3035;
           position: sticky;
           top: 0;
       }
       
       .table_deg tr:nth-child(even) {
           background-color: #2d3035;
           
       }

       .table_deg img {
           max-width: 80px;
           height: auto;
       }

       .action-buttons {
           display: flex;
           flex-direction: column;
           gap: 5px;
       }

       .btn {
           padding: 5px 10px;
           font-size: 13px;
       }
       #request{
        padding: 10px;
    word-wrap: break-word; /* لتمكين تكسير الكلمات الطويلة */
    white-space: normal; /* للسماح بانتقال النص إلى السطر التالي */
    max-width: 200px; /* يمكنك تحديد حد أقصى للعرض */
    overflow: hidden; /* إخفاء النصوص التي تتجاوز الحد الأقصى */
    text-overflow: ellipsis; /* إضافة "..." عند تجاوز النص */
       }

       .status-pending { color: #ffc107; }
       .status-approve { color: #28a745; }
       .status-rejected { color: #dc3545; }

       @media (max-width: 1200px) {
           .table_deg {
               font-size: 14px;
           }
       }
    </style>
  </head>

  <body>
   @include('admin.header')
   @include('admin.sidebar')

      <div class="page-content">
        <div class="container-fluid">
            <div class="table-container">
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th>Room ID</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Arrival</th>
                            <th>Leaving</th>
                            <th>Guests</th>
                            <th id="request" >Requests</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Room Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($data as $data)
                   <tr>
                    <td>{{$data->room_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    <td>{{$data->guests}}</td>
                    <td style="max-width: 150px; white-space: normal;">{{$data->special_requests}}</td>
                    <td>{{$data->payment_method}}</td>
                    <td>
                        @if($data->status == 'approve')
                        <span class="status-approve">Approved</span>
                        @elseif($data->status == 'rejected')
                        <span class="status-rejected">Rejected</span>
                        @else
                        <span class="status-pending">Pending</span>
                        @endif
                    </td>
                    <td>{{$data->room->room_title}}</td>
                    <td>{{$data->room->price}}</td>
                    <td><img src="/room/{{$data->room->image}}" alt="Room" style="max-width: 80px;"></td>
                    <td>
                        <div class="action-buttons">
                            <a href="#" class="btn btn-danger delete-button" data-id="{{$data->id}}">Delete</a>
                            <a href="{{url('approve_book',$data->id)}}" class="btn btn-success">Approve</a>
                            <a href="{{url('reject_book',$data->id)}}" class="btn btn-warning">Reject</a>
                        </div>
                    </td>
                   </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      
      @include('admin.footer')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              const deleteButtons = document.querySelectorAll('.delete-button');
      
              deleteButtons.forEach(button => {
                  button.addEventListener('click', function (e) {
                      e.preventDefault();
                      const bookingId = this.getAttribute('data-id');
      
                      Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to undo this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!',
                          cancelButtonText: 'Cancel'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              window.location.href = "/delete_booking/" + bookingId;
                          }
                      });
                  });
              });
          });
      </script>
  </body>
</html>