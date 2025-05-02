{{-- <!DOCTYPE html>
<html>
  <head> 

    <base href="/public">
  @include('admin.css')
  

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

      <!-- Sidebar Navigation end-->
     
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">



         <center
         style="  
         border: 1px solid #DB6574;
        box-shadow: 0 2px 10px #DB6574;"
         >


<br>

           <h1 style="font-size: 30px; font-weight: bold;">Mail Send to {{$data->name}}</h1>


           <form action="{{url('mail',$data->id)}}" method="post"> 

            @csrf


            <div class="div_deg">
                <label>Greeting</label>
                <input type="text" name="greeting">
            </div>

            <div class="div_deg">
                <label>Mail Body</label>

                <textarea name="body"> </textarea>
            </div>

               <div class="div_deg">
                <label>Action Text</label>
                <input type="text" name="action_text">
            </div>



            <div class="div_deg">
                <label>Action Url</label>
                <input type="text" name="action_url">
            </div>
      
            <div class="div_deg">
                <label>End Line</label>
                <input type="text" name="endline">
            </div>
<br><br>
          
                <div>
                    <input class="btn btn-primary" type="submit" value="Send Mail">

                </div>
<br>

        </form>



        </center>




          </div>
        </div>
      </div>



        @include('admin.footer')
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
      label{
       
        display: inline-block;
        width: 200px;
        color: white!important;


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
          <center style="border: 1px solid #DB6574; box-shadow: 0 2px 10px #DB6574;">
            <br>
            <h1 style="font-size: 30px; font-weight: bold; color: #DB6574;">Mail Send to {{$data->name}}</h1>

            <form action="{{url('mail',$data->id)}}" method="post" id="mailForm">
              @csrf

              <div class="div_deg">
                <label>Greeting</label>
                <input type="text" name="greeting" id="greeting" required>
              </div>

              <div class="div_deg">
                <label>Mail Body</label>
                <textarea name="body" id="body" required></textarea>
              </div>

              <div class="div_deg">
                <label>Action Text</label>
                <input type="text" name="action_text" id="action_text">
              </div>

              <div class="div_deg">
                <label>Action Url</label>
                <input type="text" name="action_url" id="action_url">
              </div>
        
              <div class="div_deg">
                <label>End Line</label>
                <input type="text" name="endline" id="endline">
              </div>
              <br><br>
          
              <div>
                <input class="btn btn-primary" type="submit" value="Send Mail" id="sendBtn">
              </div>
              <br>
            </form>
          </center>
        </div>
      </div>
    </div>

    @include('admin.footer')
    
    <!-- Add SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.getElementById('mailForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Basic validation
        const greeting = document.getElementById('greeting').value.trim();
        const body = document.getElementById('body').value.trim();
        
        if (!greeting || !body) {
          Swal.fire({
            title: 'Error!',
            text: 'Greeting and Mail Body are required fields',
            icon: 'error',
            confirmButtonColor: '#DB6574'
          });
          return;
        }
        
        Swal.fire({
          title: 'Confirm Send',
          text: 'Are you sure you want to send this email to {{$data->name}}?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#DB6574',
          cancelButtonColor: '#6c757d',
          confirmButtonText: 'Yes, send it!'
        }).then((result) => {
          if (result.isConfirmed) {
            // Submit the form
            this.submit();
            
            // Show success message (this will show after the form submits successfully)
            Swal.fire({
              title: 'Sent!',
              text: 'Email has been sent successfully.',
              icon: 'success',
              timer: 2000,
              showConfirmButton: false
            });
          }
        });
      });
    </script>
  </body>
</html>