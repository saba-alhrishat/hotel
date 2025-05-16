<!DOCTYPE html>
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


/* للبار*/


.pagination {
    display: flex;
    gap: 10px;
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
    text-decoration: none;
    display: block;
}

.pagination li.active {
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


<form method="GET" action="{{ url('/show_messages') }}" class="mb-4 d-flex justify-content-center">
    <input type="text" name="search" placeholder="Search messages..." class="form-control w-25 me-2" value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>




            <table class="table_deg">



              <tr>
                <th class="th_deg">Id </th>
                  <th class="th_deg">Name </th>
                  <th class="th_deg">Email</th>
                  <th class="th_deg">Phone</th>
                  <th class="th_deg">Message</th>
                  <th class="th_deg">Send Email</th>
                
              </tr>
         
              {{-- @foreach ($data as $data ) --}}
              @foreach ($data as $message)
                
             <tr>
              <td>{{$message->id}}</td>
              <td>{{$message->name}}</td>
              <td>{{$message->email}}</td>
              <td>{{$message->phone}}</td>
              <td>{{$message->message}}</td>

              <td>
                <a href="{{url('send_mail', $message->id)}}"><button class="btn btn-success" style="background-color: #DB6574; border: #DB6574;">Send Email</button></a>
              </td>
             
             </tr>
             @endforeach


          </table>


{{-- للبار --}}

<div class="d-flex justify-content-center mt-4">
  {{ $data->links() }}
</div>







          </div>
        </div>
      </div>
        @include('admin.footer')
  </body>
</html>