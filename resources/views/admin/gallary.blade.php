
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <center 
            style="border: 1px solid #DB6574; box-shadow: 0 2px 10px #DB6574;">
            <br>
            <h1 style="font-size: 40px; font-weight: bolder; color: white;">Gallary</h1>
            <br><br>

            <div class="row">
              @foreach ($gallary as $gallary) 
              <div class="col-md-4">
                <img src="/gallary/{{$gallary->image}}" style="width: 300px!important; height: 200px!important;">
                <br><br>
                <a class="btn btn-danger delete-btn" data-id="{{ $gallary->id }}">Delete Image</a>
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
              @error('image')
                <div style="color: red; font-weight: bold;">{{ $message }}</div>
              @enderror
            </form>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
              document.addEventListener('DOMContentLoaded', function () {
                // التحقق من نوع الصورة عند الرفع
                const fileInput = document.querySelector('input[name="image"]');
                const form = fileInput.closest('form');

                form.addEventListener('submit', function (e) {
                  const file = fileInput.files[0];
                  if (file) {
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                    if (!allowedTypes.includes(file.type)) {
                      e.preventDefault();
                      Swal.fire({
                        icon: 'error',
                        title: 'Invalid File Type',
                        text: 'Only image files are allowed (jpg, png, gif, svg).'
                      });
                      fileInput.value = '';
                    }
                  }
                });

                // حذف صورة مع SweetAlert
                const deleteButtons = document.querySelectorAll('.delete-btn');
                deleteButtons.forEach(button => {
                  button.addEventListener('click', function () {
                    const imageId = this.getAttribute('data-id');
                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#d33',
                      cancelButtonColor: '#3085d6',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = `/delete_gallary/${imageId}`;
                      }
                    });
                  });
                });
              });
            </script>
          </center>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
