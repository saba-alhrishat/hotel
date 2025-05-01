<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')


<style type="text/css">
       
       .table_deg{
           
           border: 2px solid white;
           margin: auto;
           width: 80%;
           text-align: center;
           margin-top: 40px;

       }

       .th_deg{
           background-color: skyblue;
           padding: 8px;

       }
       
       tr{
           border: 3px solid white;
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
                    {{-- <a class="btn btn-danger"  href="{{url('delete_booking',$data->id)}}">Delete</a> --}}

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