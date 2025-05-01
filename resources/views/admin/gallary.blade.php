<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  </head>
  <body>
   @include('admin.header')


   @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
     
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

<center>


            <h1 style="font-size: 40px; font-weight: bolder; color: white;">Gallary</h1>

<br><br>


<div class="row">
    @foreach ($gallary as $gallary) 
    <div class="col-md-4">
    <img src="/gallary/{{$gallary->image}}" style="width: 300px!important; height: 200px!important;">
    <br><br>
    <a class="btn btn-danger" href="{{url("delete_gallary",$gallary->id)}}">Delete Image</a>
    <br><br>

    </div>
    @endforeach
</div> 






            <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div style="padding: 30px">
                <label style="color: white; font-weight: bold;"> Upload Image</label>
                <input type="file" name="image" required>
              
               <input type="submit" value="Add Image" class="btn btn-primary">
                    </div>

            </form>


</center>


          </div>
        </div>
      </div>
      
        @include('admin.footer')
  </body>
</html>