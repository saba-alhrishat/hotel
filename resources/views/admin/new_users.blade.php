<!DOCTYPE html>
<html>
  
  <head> 
  @include('admin.css')

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style type="text/css">


    .table_deg{
       
      border: 1px solid #DB6574;
      box-shadow: 0 2px 10px #DB6574;
         margin: auto;
        width: 80%;
        text-align: center;
        margin-top: 40px;
        color: white

    }

    .th_deg{
      background-color: #2d3035;
      padding: 15px;

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



            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        


            <table class="table_deg">

              <tr>
                <th class="th_deg">Id </th>
                  <th class="th_deg">Name </th>
                  <th class="th_deg">Email</th>
                  <th class="th_deg">Phone</th>
                  <th class="th_deg">User Type</th>
                  {{-- <th class="th_deg">Edit</th> --}}
                  <th class="th_deg">Action</th>

                                  
              </tr>
         
              @foreach ($data as $data )
                
              <tr>
                <td>{{$data->id}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->email}}</td>
               <td>{{$data->phone}}</td>
 
            
               <td>
                @if ($data->usertype == 'admin')
                  <form method="POST" action="{{ url('change-usertype/' . $data->id) }}">
                    @csrf
                    <input type="hidden" name="usertype" value="user">
                    <button class="btn btn-warning">Make User</button>
                  </form>
                @else
                  <form method="POST" action="{{ url('change-usertype/' . $data->id) }}">
                    @csrf
                    <input type="hidden" name="usertype" value="admin">
                    <button class="btn btn-primary">Make Admin</button>
                  </form>
                @endif
              </td>
              
              {{-- <td>
              <form id="deleteForm-{{$data->id}}" action="{{ url('delete-user/' . $data->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-btn" data-id="{{$data->id}}">Delete</button>
            </form>
            
          </td> --}}


          <td>
            <!-- Edit Button -->
            <a href="{{ url('edit-user/' . $data->id) }}" class="btn btn-success" style="margin-bottom:5px;">Edit</a>
        
            <!-- Delete Form -->
            <form id="deleteForm-{{$data->id}}" action="{{ url('delete-user/' . $data->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-btn" data-id="{{$data->id}}">Delete</button>
            </form>
        </td>
        
              
              </tr>
              @endforeach
 


          </table>










          </div>
        </div>
      </div>
        @include('admin.footer')

        <script>
          document.addEventListener('DOMContentLoaded', function () {
              document.querySelectorAll('.delete-btn').forEach(function(button) {
                  button.addEventListener('click', function () {
                      const userId = this.getAttribute('data-id');
                      Swal.fire({
                          title: 'Are you sure?',
                          text: "This user will be soft-deleted!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#DB6574',
                          cancelButtonColor: '#2d3035',
                          confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              document.getElementById('deleteForm-' + userId).submit();
                          }
                      });
                  });
              });
          
              @if(session('success'))
                  Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: '{{ session('success') }}',
                      confirmButtonColor: '#DB6574'
                  });
              @endif
          
              @if(session('error'))
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: '{{ session('error') }}',
                      confirmButtonColor: '#DB6574'
                  });
              @endif
          });
          </script>
          
  </body>
</html>