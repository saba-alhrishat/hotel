<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
   


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   
</head>
<body>
    {{-- @include('admin.header')
    @include('admin.sidebar') --}}

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="form-container">
                           <div class="edit-user-container">
                        <h2 class="edit-user-title">Edit User</h2>
                        
                        @if(session('success'))
                            <div class="edit-success-alert">{{ session('success') }}</div>
                        @endif
                        
                        @if(session('error'))
                            <div class="edit-error-alert">{{ session('error') }}</div>
                        @endif
                    
                        <form method="POST" action="{{ url('update-user/' . $user->id) }}" class="user-edit-form">
                            @csrf
                            @method('PUT')
                            
                            <div class="edit-form-group">
                                <label for="name" class="edit-form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}" class="edit-form-input" required>
                            </div>
                            
                            <div class="edit-form-group">
                                <label for="email" class="edit-form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" class="edit-form-input" required>
                            </div>
                            
                            <div class="edit-form-group">
                                <label for="phone" class="edit-form-label">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="edit-form-input">
                            </div>
                            
                            <div class="edit-form-group">
                                <label for="usertype" class="edit-form-label">User Type</label>
                                <select id="usertype" name="usertype" class="edit-form-select">
                                    <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            
                            <div class="edit-form-actions">
                                <button type="submit" class="edit-submit-btn">Update</button>
                                <a href="/new_users" class="edit-back-btn">Back</a>
                            </div>
                        </form>
                    </div>
                    
                    <style type="text/css">
                        .edit-user-container {
                            max-width: 600px;
                            margin: 40px auto;
                            padding: 30px;
                            background-color: #2d3035;
                            border-radius: 10px;
                            /* box-shadow: 0 4px 15px rgba(219, 101, 116, 0.3); */
                            box-shadow: 0 8px 15px #DB6574;
                            color: #ffffff;
                        }
                    
                        .edit-user-title {
                            text-align: center;
                            margin-bottom: 25px;
                            color: #DB6574;
                            font-size: 24px;
                        }
                    
                     
                    
                        .edit-error-alert {
                            background-color: #dc3545;
                            color: white;
                            padding: 10px;
                            border-radius: 5px;
                            margin-bottom: 20px;
                        }
                    
                        .user-edit-form {
                            display: flex;
                            flex-direction: column;
                            gap: 15px;
                        }
                    
                        .edit-form-group {
                            margin-bottom: 20px;
                        }
                    
                        .edit-form-label {
                            display: block;
                            margin-bottom: 8px;
                            font-weight: 600;
                            color: #f8f9fa;
                        }
                    
                        .edit-form-input,
                        .edit-form-select {
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #DB6574;
                            border-radius: 6px;
                            background-color: #1e1e2d;
                            color: #ffffff;
                            transition: all 0.3s ease;
                        }
                    
                        .edit-form-input:focus,
                        .edit-form-select:focus {
                            outline: none;
                            border-color: #c45564;
                            box-shadow: 0 0 0 3px rgba(219, 101, 116, 0.25);
                        }
                    
                        .edit-form-actions {
                            display: flex;
                            justify-content: space-between;
                            margin-top: 25px;
                        }
                    
                        .edit-submit-btn {
                            background-color: #DB6574;
                            color: white;
                            padding: 12px 25px;
                            border: none;
                            border-radius: 6px;
                            cursor: pointer;
                            font-weight: 600;
                            transition: background-color 0.3s;
                        }
                    
                        .edit-submit-btn:hover {
                            background-color: #c45564;
                        }
                    
                        .edit-back-btn {
                            background-color: #6c757d;
                            color: white;
                            padding: 12px 25px;
                            border-radius: 6px;
                            text-decoration: none;
                            text-align: center;
                            font-weight: 600;
                            transition: background-color 0.3s;
                        }
                    
                        .edit-back-btn:hover {
                            background-color: #5a6268;
                            color: white;
                        }
                    </style>



                </div>
            </div>
        </div>
    </div>
   

   
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