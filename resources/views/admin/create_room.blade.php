{{-- <!DOCTYPE html>
<html>
  <head> 
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
        <h1 style="font-size: 30px; font-weight: bold;">Add Rooms</h1>
        <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data"> 

            @csrf


            <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title">
            </div>

            <div class="div_deg">
                <label>Description</label>

                <textarea name="description"> </textarea>
            </div>

               <div class="div_deg">
                <label>Price</label>
                <input type="number" name="price">
            </div>


            <div class="div_deg">
                <label>Room Type</label>
                <select name="type">
                    <option selected value="regular">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="delux">Delux</option>
                </select>
            </div>

            <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi">
                    <option selected value="yes">Yes</option>
                    <option value="no">NO</option>
                </select>
            </div class="div_deg">



           <div class="div_deg">
            <label> Upload Image</label>
            <input type="file" name="image">
           </div>


                <div>
                    <input class="btn btn-primary" type="submit" value="Add Room">

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
    @include('admin.css')
    <style type="text/css">
      :root {
        --primary-color: #DB6574;
        --secondary-color: #5a6268;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --border-radius: 8px;
        --box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
      }
      
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
        color: var(--dark-color);
     
        
      }
      
      .div_center {
        text-align: center;
        padding: 40px 30px;
        max-width: 800px;
        margin: 30px auto;
        /* background: white; */
        background: #2c3e5000;

        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        border: 1px solid #DB6574;
        box-shadow: 0 2px 10px #DB6574;
      }
      
      h1 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 10px;
      }
      
      h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #ff9a9e);
      }
      
      .div_deg {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
      }
      
      label {
        display: inline-block;
        width: 200px;
        text-align: right;
        margin-right: 20px;
        font-weight: 500;
        color: var(--secondary-color);
      }
      
      input[type="text"],
      input[type="number"],
      textarea,
      select {
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: var(--border-radius);
        width: 300px;
        font-family: inherit;
        font-size: 15px;
        transition: var(--transition);
        background-color: var(--light-color);
      }
      
      input[type="text"]:focus,
      input[type="number"]:focus,
      textarea:focus,
      select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(219, 101, 116, 0.1);
        outline: none;
      }
      
      textarea {
        height: 120px;
        resize: vertical;
      }
      
      select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
      }
      
      .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff9a9e);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 500;
        font-size: 16px;
        transition: var(--transition);
        margin-top: 30px;
        box-shadow: 0 4px 15px rgba(219, 101, 116, 0.2);
      }
      
      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(219, 101, 116, 0.3);
      }
      
      input[type="file"] {
        padding: 10px;
        border: 1px dashed #ddd;
        border-radius: var(--border-radius);
        width: 300px;
        transition: var(--transition);
      }
      
      input[type="file"]:hover {
        border-color: var(--primary-color);
        background-color: rgba(219, 101, 116, 0.05);
      }
      
      .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: none;
        width: 100%;
        text-align: center;
      }
      
      @media (max-width: 768px) {
        .div_center {
          padding: 30px 20px;
          margin: 20px;
        }
        
        .div_deg {
          flex-direction: column;
          align-items: flex-start;
        }
        
        label {
          text-align: left;
          margin-bottom: 8px;
          width: 100%;
          margin-right: 0;
        }
        
        input[type="text"],
        input[type="number"],
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
            <h1>Add New Room</h1>
            <br>
            <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data" id="addRoomForm">
              @csrf

              <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title" required>
              </div>

              <div class="div_deg">
                <label>Description</label>
                <textarea name="description" required></textarea>
              </div>

              <div class="div_deg">
                <label>Price</label>
                <input type="number" name="price" required min="1">
              </div>

              <div class="div_deg">
                <label>Room Type</label>
                <select name="type" required>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="delux">Delux</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi" required>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Upload Image</label>
                <input type="file" name="image" id="roomImage" accept="image/*" required>
                <div class="error-message" id="imageError">Please upload a valid image file (JPEG, PNG, GIF)</div>
              </div>

              <div>
                <input class="btn btn-primary" type="submit" value="Add Room">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
    @include('admin.footer')
    
    <script>
      document.getElementById('addRoomForm').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('roomImage');
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
      
      document.getElementById('roomImage').addEventListener('change', function() {
        const errorElement = document.getElementById('imageError');
        errorElement.style.display = 'none';
      });
    </script>
  </body>
</html> --}}










<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style type="text/css">
      :root {
        --primary-color: #DB6574;
        --secondary-color: #5a6268;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --border-radius: 8px;
        --box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
      }
      
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
        color: var(--dark-color);
      }
      
      .div_center {
        text-align: center;
        padding: 40px 30px;
        max-width: 800px;
        margin: 30px auto;
        background: #2c3e5000;
        border-radius: var(--border-radius);
        border: 1px solid #DB6574;
        box-shadow: 0 2px 10px #DB6574;
      }
      
      h1 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 10px;
      }
      
      h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #ff9a9e);
      }
      
      .div_deg {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
      }
      
      label {
        display: inline-block;
        width: 200px;
        text-align: right;
        margin-right: 20px;
        font-weight: 500;
        color: var(--secondary-color);
      }
      
      input[type="text"],
      input[type="number"],
      textarea,
      select {
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: var(--border-radius);
        width: 300px;
        font-family: inherit;
        font-size: 15px;
        transition: var(--transition);
        background-color: var(--light-color);
      }
      
      input[type="text"]:focus,
      input[type="number"]:focus,
      textarea:focus,
      select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(219, 101, 116, 0.1);
        outline: none;
      }
      
      textarea {
        height: 120px;
        resize: vertical;
      }
      
      select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
      }
      
      .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #ff9a9e);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 500;
        font-size: 16px;
        transition: var(--transition);
        margin-top: 30px;
        box-shadow: 0 4px 15px rgba(219, 101, 116, 0.2);
      }
      
      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(219, 101, 116, 0.3);
      }
      
      input[type="file"] {
        padding: 10px;
        border: 1px dashed #ddd;
        border-radius: var(--border-radius);
        width: 300px;
        transition: var(--transition);
      }
      
      input[type="file"]:hover {
        border-color: var(--primary-color);
        background-color: rgba(219, 101, 116, 0.05);
      }
      
      .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: none;
        width: 100%;
        text-align: center;
      }
      
      @media (max-width: 768px) {
        .div_center {
          padding: 30px 20px;
          margin: 20px;
        }
        
        .div_deg {
          flex-direction: column;
          align-items: flex-start;
        }
        
        label {
          text-align: left;
          margin-bottom: 8px;
          width: 100%;
          margin-right: 0;
        }
        
        input[type="text"],
        input[type="number"],
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
            <h1>Add New Room</h1>
            <br>
            <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data" id="addRoomForm">
              @csrf

              <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title" required>
              </div>

              <div class="div_deg">
                <label>Description</label>
                <textarea name="description" required></textarea>
              </div>

              <div class="div_deg">
                <label>Price</label>
                <input type="number" name="price" required min="1">
              </div>

              <div class="div_deg">
                <label>Room Type</label>
                <select name="type" required>
                  <option value="Standard">Standard Room
                  </option>
                  <option value="Deluxe">Deluxe Room
                  </option>
                  <option value="Executive">Executive Suite
                  </option>
                  <option value="Family">Family Room
                  </option>
                  <option value="Honeymoon">Honeymoon Suite
                  </option>
                  <option value="Presidential">Presidential Suite
                  </option>
                </select>
              </div>

              <div class="div_deg">
                <label>Free Wifi</label>
                <select name="wifi" required>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="div_deg">
                <label>Upload Image</label>
                <input type="file" name="image" id="roomImage" accept="image/*" required>
                <div class="error-message" id="imageError">Please upload a valid image file (JPEG, PNG, GIF)</div>
              </div>

              <div>
                <input class="btn btn-primary" type="submit" value="Add Room" id="addRoomBtn">
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
      document.getElementById('addRoomForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const fileInput = document.getElementById('roomImage');
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
            title: 'Add New Room',
            text: 'Are you sure you want to add this new room?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#DB6574',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit the form if confirmed
              document.getElementById('addRoomForm').submit();
              
              // Show success message after form submission
              Swal.fire({
                title: 'Added!',
                text: 'The new room has been added successfully.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
              });
            }
          });
        }
      });
      
      document.getElementById('roomImage').addEventListener('change', function() {
        const errorElement = document.getElementById('imageError');
        errorElement.style.display = 'none';
      });
    </script>
  </body>
</html>