{{-- <!DOCTYPE html>
<html>
  <head> 

    <base href="/public">

  @include('admin.css')
    <style type="text/css">
      label{
        display: inline-block;
        width: 200px;
      }
       .div_deg{
        padding-top: 30px;
       }
       .div_center{
        text-align: center;
        padding-top: 40px;
       }


       </style>
  </head>
  <body>
   @include('admin.header')


   @include('admin.sidebar')

   <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

      <div class="div_center">
        <h1 style="font-size: 30px; font-weight: bold;">Update Room</h1>
        <form action="{{url('edit_room' ,$data->id)}}" method="post" enctype="multipart/form-data"> 

            @csrf


            <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title" value="{{$data->room_title}}">
            </div>

            <div class="div_deg">
                <label>Description</label>

                <textarea name="description">{{$data->description}}    
                </textarea>
            </div>

               <div class="div_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}">
            </div>


            <div class="div_deg">
                <label>Room Type</label>
                <select name="type">
                    <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                    <option value="regular">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="delux">Delux</option>
                </select>
            </div>

            <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi">
                    <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                    <option selected value="yes">Yes</option>
                    <option value="no">NO</option>
                </select>
            </div class="div_deg">


            <div class="div_deg">
                <label> Current Image</label>
                <img style="margin:auto;" width="100" src="/room/{{$data->image}}">
               </div>


           <div class="div_deg">
            <label> Upload Image</label>
            <input type="file" name="image">
           </div>


                <div>
                    <input class="btn btn-primary" type="submit" value="Update Room">

                </div>


        </form>
      </div>

      </div>
    </div>
   </div>
      
        @include('admin.footer')
  </body>
</html> --}}















 {{-- <!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
      }
      
      .div_center {
        text-align: center;
        padding: 40px;
        max-width: 700px;
        margin: 30px auto;
        /* background: white; */
        background: #2c3e5000;
        border-radius: 10px #DB6574;
        box-shadow: 0 2px 10px #DB6574;

      }
      
      h1 {
        font-size: bolder;
        font-weight: 900px;
        margin-bottom: 30px;
        /* color: #2c3e50; */
        color: #DB6574;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
      }
      
      .div_deg {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      label {
        display: inline-block;
        width: 200px;
        text-align: right;
        margin-right: 20px;
        font-weight: 500;
        color: #495057;
      }
      
      input[type="text"],
      textarea,
      select {
        padding: 10px 15px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        width: 300px;
        font-family: inherit;
        font-size: 14px;
        transition: all 0.3s ease;
      }
      
      input[type="text"]:focus,
      textarea:focus,
      select:focus {
        border-color: #DB6574;
        outline: none;
        box-shadow: 0 0 0 3px rgba(219, 101, 116, 0.1);
      }
      
      textarea {
        height: 100px;
        resize: vertical;
      }
      
      select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
      }
      
      img {
        border: 1px solid #eee;
        border-radius: 6px;
        padding: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      }
      
      .btn-primary {
        background-color: #DB6574;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 20px;
        font-size: 15px;
      }
      
      .btn-primary:hover {
        background-color: #c95565;
        transform: translateY(-2px);
      }
      
      input[type="file"] {
        padding: 8px;
        border: 1px dashed #ddd;
        border-radius: 6px;
        width: 300px;
      }
      
      .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: none;
      }
      
      @media (max-width: 768px) {
        .div_deg {
          flex-direction: column;
          align-items: flex-start;
        }
        
        label {
          text-align: left;
          margin-bottom: 8px;
          width: 100%;
        }
        
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="div_center">
            <h1>Update Room</h1>
            <br>         
            

            <form action="{{url('edit_room' ,$data->id)}}" method="post" enctype="multipart/form-data" id="roomForm">
              @csrf

              <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title" value="{{$data->room_title}}" required>
              </div>

              <div class="div_deg">
                <label>Description</label>
                <textarea name="description" required>{{$data->description}}</textarea>
              </div>

              <div class="div_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}" required>
              </div>

              <div class="div_deg">
                <label>Room Type</label>
                <select name="type" required>
                  <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="delux">Delux</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi" required>
                  <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Current Image</label>
                <img style="margin:auto;" width="120" src="/room/{{$data->image}}">
              </div>

              <div class="div_deg">
                <label>Upload Image</label>
                <input type="file" name="image" id="imageUpload" accept="image/*">
                <div class="error-message" id="imageError">Please upload a valid image file (JPEG, PNG, GIF)</div>
              </div>

              <div>
                <input class="btn btn-primary" type="submit" value="Update Room">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
    @include('admin.footer')
    
    <script>
      document.getElementById('roomForm').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('imageUpload');
        const file = fileInput.files[0];
        const errorElement = document.getElementById('imageError');
        
        if (file) {
          const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
          if (!validTypes.includes(file.type)) {
            e.preventDefault();
            errorElement.style.display = 'block';
            fileInput.focus();
          } else {
            errorElement.style.display = 'none';
          }
        }
      });
      
      document.getElementById('imageUpload').addEventListener('change', function() {
        const errorElement = document.getElementById('imageError');
        errorElement.style.display = 'none';
      });
    </script>
  </body>
</html> --}}



<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style type="text/css">
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
      }
      
      .div_center {
        text-align: center;
        padding: 40px;
        max-width: 700px;
        margin: 30px auto;
        background: #2c3e5000;
        border-radius: 10px;
        box-shadow: 0 2px 10px #DB6574;
      }
      
      h1 {
        font-size: bolder;
        font-weight: 900;
        margin-bottom: 30px;
        color: #DB6574;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
      }
      
      .div_deg {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      label {
        display: inline-block;
        width: 200px;
        text-align: right;
        margin-right: 20px;
        font-weight: 500;
        color: #495057;
      }
      
      input[type="text"],
      textarea,
      select {
        padding: 10px 15px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        width: 300px;
        font-family: inherit;
        font-size: 14px;
        transition: all 0.3s ease;
      }
      
      input[type="text"]:focus,
      textarea:focus,
      select:focus {
        border-color: #DB6574;
        outline: none;
        box-shadow: 0 0 0 3px rgba(219, 101, 116, 0.1);
      }
      
      textarea {
        height: 100px;
        resize: vertical;
      }
      
      select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
      }
      
      img {
        border: 1px solid #eee;
        border-radius: 6px;
        padding: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      }
      
      .btn-primary {
        background-color: #DB6574;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 20px;
        font-size: 15px;
      }
      
      .btn-primary:hover {
        background-color: #c95565;
        transform: translateY(-2px);
      }
      
      input[type="file"] {
        padding: 8px;
        border: 1px dashed #ddd;
        border-radius: 6px;
        width: 300px;
      }
      
      .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: none;
      }
      
      @media (max-width: 768px) {
        .div_deg {
          flex-direction: column;
          align-items: flex-start;
        }
        
        label {
          text-align: left;
          margin-bottom: 8px;
          width: 100%;
        }
        
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="div_center">
            <h1>Update Room</h1>
            <br>         

            <form action="{{url('edit_room' ,$data->id)}}" method="post" enctype="multipart/form-data" id="roomForm">
              @csrf

              <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title" value="{{$data->room_title}}" required>
              </div>

              <div class="div_deg">
                <label>Description</label>
                <textarea name="description" required>{{$data->description}}</textarea>
              </div>

              <div class="div_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}" required>
              </div>

              <div class="div_deg">
                <label>Room Type</label>
                <select name="type" required>
                  <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="delux">Delux</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi" required>
                  <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Current Image</label>
                <img style="margin:auto;" width="120" src="/room/{{$data->image}}">
              </div>

              <div class="div_deg">
                <label>Upload Image</label>
                <input type="file" name="image" id="imageUpload" accept="image/*">
                <div class="error-message" id="imageError">Please upload a valid image file (JPEG, PNG, GIF)</div>
              </div>

              <div>
                <input class="btn btn-primary" type="submit" value="Update Room" id="updateBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
    @include('admin.footer')
    
    <!-- Add SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.getElementById('roomForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const fileInput = document.getElementById('imageUpload');
        const file = fileInput.files[0];
        const errorElement = document.getElementById('imageError');
        let isValid = true;
        
        if (file) {
          const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
          if (!validTypes.includes(file.type)) {
            errorElement.style.display = 'block';
            fileInput.focus();
            isValid = false;
          } else {
            errorElement.style.display = 'none';
          }
        }
        
        if (isValid) {
          Swal.fire({
            title: 'Updating Room',
            text: 'Are you sure you want to update this room?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#DB6574',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit the form if confirmed
              document.getElementById('roomForm').submit();
              
              // Show success message after form submission
              Swal.fire({
                title: 'Updated!',
                text: 'The room has been updated successfully.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
              });
            }
          });
        }
      });
      
      document.getElementById('imageUpload').addEventListener('change', function() {
        const errorElement = document.getElementById('imageError');
        errorElement.style.display = 'none';
      });
    </script>
  </body>
</html>