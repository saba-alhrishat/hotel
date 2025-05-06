<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
   <style>
    :root {
        --primary-color: #DB6574;
        --dark-color: #2d3035;
        --light-color: #f8f9fa;
    }
    
    body {
        background-color: #1a1c20;
        color: var(--light-color);
        font-family: 'Tajawal', sans-serif;
        min-height: 100vh;
    }
    
    .profile-container {
        background-color: var(--dark-color);
        border-radius: 15px;
        padding: 30px;
        margin-top: 50px;
        border: 1px solid var(--primary-color);
        box-shadow: 0 2px 15px rgba(219, 101, 116, 0.3);
    }
    
    .booking-table {
        margin-top: 30px;
        border: 1px solid var(--primary-color);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .booking-table th {
        background-color: #3a3e46;
        color: white;
    }
    
    .booking-table tr {
        transition: all 0.3s;
    }
    
    .booking-table tr:hover {
        background-color: rgba(219, 101, 116, 0.1);
    }
    
    .logout-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        transition: all 0.3s;
    }
    
    .dashboard-btn {
        background-color: var(--dark-color);
        color: white;
        border: 1px solid var(--primary-color);
        padding: 8px 20px;
        border-radius: 5px;
        transition: all 0.3s;
        margin-right: 10px;
    }
    
    .logout-btn:hover {
        background-color: #c94d5d;
        transform: translateY(-2px);
    }
    
    .dashboard-btn:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }
    
    .user-info-card {
        /* background: linear-gradient(135deg, #3a3e46 0%, #2d3035 100%); */
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        border: 1px solid var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(219, 101, 116, 0.25);

    }
    
    .alert-primary-custom {
        background-color: rgba(219, 101, 116, 0.2);
        color: white;
        border: 1px solid var(--primary-color);
        border-radius: 10px;
    }
    
    .form-control {
        background-color: #3a3e46;
        border: 1px solid #4e525a;
        color: white;
    }
    
    .form-control:focus {
        background-color: #4e525a;
        color: white;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(219, 101, 116, 0.25);
    }
    
    .badge {
        font-weight: 500;
        padding: 6px 10px;
    }
</style>
    @include('home.css')
</head>
<body>
    <header>
        @include('home.header')
    </header>



    @if(session('success'))
    <div class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif





    <div class="container profile-container">
        <div class="user-info-card">
            <h1 class="mb-4">Welcome {{ Auth::user()->name }} <span class="badge bg-secondary">{{ Auth::user()->usertype }}</span></h1>
            
            <!-- Form for editing user info -->
            <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <div>
                        @if(Auth::user()->usertype === 'admin')
                            <a href="{{ route('home') }}" class="dashboard-btn"  style="background-color: #1a1c20;">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        @endif
                        
                        <button type="submit" class="dashboard-btn" style="background-color: #DB6574; color: white;">
                            <i class="fas fa-save"></i> Update Profile
                        </button>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </form>
        </div>

        @if(Auth::user()->usertype === 'admin')
            <div class="alert alert-danger">
                <h4>You are logged in as <strong>Admin</strong></h4>
                <p>Here you can manage the system, view bookings, statistics, and manage users.</p>
            </div>
        @else
            <div class="alert alert-primary" style="background-color: #de98a3dd; color: white; border: #DB6574;">
                <h4>You are logged in as a regular user</h4>
                <p>Here you can view your information, booking history, and update your details.</p>
            </div>
            <div class="booking-table">
                <br>
                <h5 class="mb-6" style="color: white; display:flex; justify-content: center;">Your Booking History</h5>
                
                @if(isset($bookings) && $bookings->isEmpty())
                    <div class="alert alert-info">You currently have no bookings.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Room</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings ?? [] as $booking)
                                    <tr>
                                        <td>{{ $booking->room->room_title ?? 'Not specified' }}</td>
                                        <td>{{ $booking->start_date }}</td>
                                        <td>{{ $booking->end_date }}</td>
                                        <td>
                                            @if($booking->status == 'approved')
                                                <span class="badge bg-success">Confirmed</span>
                                            @elseif($booking->status == 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @else
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // Auto-refresh bookings every 5 seconds
        function refreshBookings() {
            fetch(window.location.href)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTable = doc.querySelector('.booking-table');
                    if (newTable) {
                        document.querySelector('.booking-table').outerHTML = newTable.outerHTML;
                    }
                })
                .catch(error => console.error('Error refreshing bookings:', error));
        }
    
        // Initial refresh after page load
        document.addEventListener('DOMContentLoaded', function() {
            // Start auto-refresh
            setInterval(refreshBookings, 5000);
            
            // Add animation to status badges
            document.querySelectorAll('.badge').forEach(badge => {
                badge.style.transition = 'all 0.3s';
                badge.addEventListener('mouseenter', () => {
                    badge.style.transform = 'scale(1.1)';
                });
                badge.addEventListener('mouseleave', () => {
                    badge.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>