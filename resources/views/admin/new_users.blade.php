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

/* للصورة */


.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #DB6574;
    transition: transform 0.3s;
}

.profile-img:hover {
    transform: scale(1.1);
}


/* تحسينات الصورة القابلة للنقر */
.clickable-img {
    cursor: pointer;
    transition: transform 0.3s;
}

.clickable-img:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(219, 101, 116, 0.5);
}

/* تأثيرات الـ Modal */
#imageModal {
    transition: opacity 0.3s;
}

#imageModal img {
    animation: zoomIn 0.3s;
}

@keyframes zoomIn {
    from { transform: scale(0.5); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
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


<form action="{{ url('search-user') }}" method="GET" class="mb-4 d-flex justify-content-center">
    <input type="text" name="search" placeholder="Search user..." class="form-control w-25 me-2" value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>




            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        


            <table class="table_deg">

              <tr>
                <th class="th_deg">Id </th>
                <th class="th_deg">Image</th>
                  <th class="th_deg">Name </th>
                  <th class="th_deg">Email</th>
                  <th class="th_deg">Phone</th>
                  <th class="th_deg">User Type</th>
                  {{-- <th class="th_deg">Edit</th> --}}
                  <th class="th_deg">Action</th>

                                  
              </tr>
         
              @foreach ($data as $user )
                
              <tr>
                <td>{{$user->id}}</td>
               

                <td>
                  @if($user->profile_image)
                      <img src="{{ asset('storage/' . $user->profile_image) }}" 
                           class="profile-img clickable-img" 
                           data-fullimage="{{ asset('storage/' . $user->profile_image) }}"
                           alt="{{ $user->name }}">
                  @else
                      <img src="{{ asset('img/default-profile.png') }}" 
                           class="profile-img" 
                           alt="Default profile">
                  @endif
              </td>


               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{$user->phone}}</td>
 
            
               <td>
                @if ($user->usertype == 'admin')
                  <form method="POST" action="{{ url('change-usertype/' . $user->id) }}">
                    @csrf
                    <input type="hidden" name="usertype" value="user">
                    <button class="btn btn-warning">Make User</button>
                  </form>
                @else
                  <form method="POST" action="{{ url('change-usertype/' . $user->id) }}">
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
            <a href="{{ url('edit-user/' . $user->id) }}" class="btn btn-success" style="margin-bottom:5px;">Edit</a>
        
            <!-- Delete Form -->
            <form id="deleteForm-{{$user->id}}" action="{{ url('delete-user/' . $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-btn" data-id="{{$user->id}}">Delete</button>
            </form>
        </td>
        
              
              </tr>
              @endforeach
 


          </table>




          <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $data->links() }}
        </div>



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
         
         

         {{-- للصورة --}}









         <script>
          document.addEventListener('DOMContentLoaded', function() {
              // إنشاء Modal ديناميكي
              const modal = document.createElement('div');
              modal.id = 'imageModal';
              modal.style.display = 'none';
              modal.style.position = 'fixed';
              modal.style.zIndex = '1000';
              modal.style.left = '0';
              modal.style.top = '0';
              modal.style.width = '100%';
              modal.style.height = '100%';
              modal.style.backgroundColor = 'rgba(0,0,0,0.9)';
              modal.style.justifyContent = 'center';
              modal.style.alignItems = 'center';
              modal.style.flexDirection = 'column';
              document.body.appendChild(modal);
          
              // صورة العرض الكبير
              const modalImg = document.createElement('img');
              modalImg.style.maxHeight = '80%';
              modalImg.style.maxWidth = '80%';
              modalImg.style.objectFit = 'contain';
          
              // زر الإغلاق
              const closeBtn = document.createElement('span');
              closeBtn.innerHTML = '&times;';
              closeBtn.style.position = 'absolute';
              closeBtn.style.top = '20px';
              closeBtn.style.right = '30px';
              closeBtn.style.color = '#DB6574';
              closeBtn.style.fontSize = '35px';
              closeBtn.style.fontWeight = 'bold';
              closeBtn.style.cursor = 'pointer';
          
              modal.appendChild(closeBtn);
              modal.appendChild(modalImg);
          
              // أحداث النقر
              document.querySelectorAll('.clickable-img').forEach(img => {
                  img.addEventListener('click', function() {
                      modal.style.display = 'flex';
                      modalImg.src = this.dataset.fullimage;
                  });
              });
          
              // إغلاق Modal
              closeBtn.addEventListener('click', function() {
                  modal.style.display = 'none';
              });
          
              // إغلاق بالنقر خارج الصورة
              modal.addEventListener('click', function(e) {
                  if (e.target === modal) {
                      modal.style.display = 'none';
                  }
              });
          });
          </script>









  </body>
</html>