<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')


    <style type="text/css">
        .table_deg {
            border: 1px solid #DB6574;
           box-shadow: 0 2px 10px #DB6574;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
            border-collapse: collapse;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    
        .th_deg {
            padding: 15px;
            font-weight: 600;
            /* color: #333; */
            color: white;
            border-bottom: 2px solid #DB6574;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        tr {
            border-bottom: 1px solid #e0e0e0;
        }
    
        tr:last-child {
            border-bottom: none;
        }
    
        td {
            padding: 12px;
            color: white;

        }
    
        .btn {
            padding: 6px 12px;
            border-radius: 3px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 14px;
        }
    
        .btn-danger {
            background-color: transparent;
            color: #DB6574;
            border-color: #DB6574;
        }
    
        .btn-danger:hover {
            background-color: #DB6574;
            color: white;
        }
    
        .btn-warning {
            background-color: transparent;
            color: #FFA000;
            border-color: #FFA000;
        }
    
        .btn-warning:hover {
            background-color: #FFA000;
            color: white;
        }
    
        img {
            border-radius: 3px;
            border: 1px solid #e0e0e0;
            max-width: 100px;
            height: auto;
        }

/* للبار */


/* تنسيق Pagination */
.pagination {
    display: flex;
    gap: 8px;
    justify-content: center;
    margin-top: 20px;
    list-style: none;
    padding: 0;
}

.pagination li {
    background-color: #2d3035;
    border: 1px solid #DB6574;
    border-radius: 4px;
}

.pagination li a {
    color: white;
    padding: 8px 16px;
    display: block;
    text-decoration: none;
}

.pagination li.active a {
    background-color: #DB6574;
}

.pagination li:hover:not(.active) {
    background-color: #3a3f44;
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








          
          
<form method="GET" action="{{ url('show_rooms') }}" class="mb-4 d-flex justify-content-center">
    <input type="text" name="search" placeholder="Search rooms..." class="form-control w-25 me-2" value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>








            <table class="table_deg">

                <tr>
                    <th class="th_deg">Room Id</th>
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Wifi</th>
                    <th class="th_deg">Room Type</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Update</th>
                </tr>
           
             @foreach($data as $room)
               <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->room_title}}</td>
                <td>{!! Str::limit($room->description,150) !!}</td>
                <td>{{$room->price}}JD</td>
                <td>{{$room->wifi}}</td>
                <td>{{$room->room_type}}</td>
                <td><img width="100" src="/room/{{$room->image}}"></td>
                {{-- <td>
                <a  onclick="return confirm('Are you sure to delete this')" class="btn btn-danger" href="{{url('room_delete' ,$data->id)}}">Delete</a>    
                </td> --}}

                {{-- سويت اليرت --}}
                <td>
                    <a href="{{url('room_delete' ,$room->id)}}" class="btn btn-danger delete-btn" data-id="{{ $room->id }}">Delete</a>
                </td>

                <td>
                    <a class="btn btn-warning" href="{{url('room_update' ,$room->id)}}">Update</a>    
                    </td>

               </tr>

               @endforeach

            </table>

<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-4 mb-4">
    {{ $data->links() }}
</div>

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