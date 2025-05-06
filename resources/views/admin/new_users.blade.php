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
                <th class="th_deg">Id </th>
                  <th class="th_deg">Name </th>
                  <th class="th_deg">Email</th>
                  <th class="th_deg">Phone</th>
                  <th class="th_deg">Send Email</th>
                
              </tr>
         
              @foreach ($data as $data )
                
              <tr>
                <td>{{$data->id}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->email}}</td>
               <td>{{$data->phone}}</td>
 
               <td>
                 <a href="{{url('send_mail', $data->id)}}"><button class="btn btn-success" style="background-color: #DB6574; border: #DB6574;">Send Email</button></a>
               </td>
              
              </tr>
              @endforeach
 


          </table>










          </div>
        </div>
      </div>
        @include('admin.footer')
  </body>
</html>