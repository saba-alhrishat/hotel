<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    {{-- @extends('admin.css') --}}
   



   
    <style type="text/css">
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            /* background-color: #2d3035; */
            border-radius: 8px;
            box-shadow: 0 2px 10px #DB6574;
            color: black;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #DB6574;
            background-color: #1e1e2d;
            color: white;
        }
        .btn-submit {
            background-color: #DB6574;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #c45564;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="form-container">
          <div class="div_center">

                    <h2>Edit User</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ url('update-user/' . $user->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="usertype">User Type</label>
                            <select id="usertype" name="usertype">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn-submit">Update</button>
                        <button type="submit" class="btn btn-black"><a href="/new_users">Back</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('admin.footer')


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>
</body>
</html>