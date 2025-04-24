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
            padding: 15px;

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
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Wifi</th>
                    <th class="th_deg">Room Type</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                </tr>
           
             @foreach($data as $data)
               <tr>
                <td>{{$data->room_title}}</td>
                <td>{!! Str::limit($data->description,150) !!}</td>
                <td>{{$data->price}}$</td>
                <td>{{$data->wifi}}</td>
                <td>{{$data->room_type}}</td>
                <td><img width="100" src="/room/{{$data->image}}"></td>
                {{-- <td>
                <a  onclick="return confirm('Are you sure to delete this')" class="btn btn-danger" href="{{url('room_delete' ,$data->id)}}">Delete</a>    
                </td> --}}

                {{-- سويت اليرت --}}
                <td>
                    <a href="{{url('room_delete' ,$data->id)}}" class="btn btn-danger delete-btn" data-id="{{ $data->id }}">Delete</a>
                </td>

               </tr>

               @endforeach

            </table>

          </div>
        </div>
      </div>
      
        @include('admin.footer')
  </body>


  {{--  سويت اليرت --}}

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure to delete this?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/room_delete/' + id;
                    }
                });
            });
        });
    });
</script>



</html>