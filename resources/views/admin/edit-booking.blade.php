{{-- <!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="form-container">
               <div class="edit-user-container">
    <h2 class="edit-user-title">Edit Booking</h2>

    @if(session('success'))
        <div class="edit-success-alert">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="edit-error-alert">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('booking.update', $booking->id) }}" class="user-edit-form">
        @csrf
        @method('PUT')



        <div class="edit-form-group">
            <label class="edit-form-label">Email</label>
            <input type="email" name="email" value="{{ $booking->email }}" class="edit-form-input" readonly>
        </div>

        <div class="edit-form-group">
            <label class="edit-form-label">Phone</label>
            <input type="text" name="phone" value="{{ $booking->phone }}" class="edit-form-input" required>
        </div>


    <!-- اسم الغرفة -->
    {{-- <div class="edit-form-group">
        <label class="edit-form-label">Room Name</label>
        <input type="text" name="room_name" value="{{ $booking->room->name }}" class="edit-form-input" required>
    </div> --}}


        <div class="edit-form-group">
                
                <label>Room Type</label>
                <select name="type" required>
<option selected value="{{ $booking->room->room_type }}">{{ $booking->room->room_type }}</option>
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

        <div class="edit-form-group">
            <label class="edit-form-label">Number of Guests</label>
            <input type="number" name="guests" value="{{ $booking->guests }}" min="1" max="20" class="edit-form-input" required>
        </div>

        <div class="edit-form-group">
            <label class="edit-form-label">Special Requests</label>
            <textarea name="special_requests" class="edit-form-input" rows="4">{{ $booking->special_requests }}</textarea>
        </div>

        <div class="edit-form-group">
            <label class="edit-form-label">Payment Method</label>
            <select name="payment_method" class="edit-form-select" required>
                <option value="cash_on_delivery" {{ $booking->payment_method == 'cash_on_delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                <option value="online_payment" {{ $booking->payment_method == 'online_payment' ? 'selected' : '' }}>Online Payment</option>
            </select>
        </div>

        <div class="edit-form-group">
            <label class="edit-form-label">Start Date</label>
            <input type="date" name="startDate" value="{{ $booking->start_date }}" class="edit-form-input" required>
        </div>

        <div class="edit-form-group">
            <label class="edit-form-label">End Date</label>
            <input type="date" name="endDate" value="{{ $booking->end_date }}" class="edit-form-input" required>
        </div>

        <div class="edit-form-actions">
            <button type="submit" class="edit-submit-btn">Update Booking</button>
            <a href="{{ url('/profile') }}" class="edit-back-btn">Back</a>
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

                    .edit-success-alert {
                        background-color: #28a745;
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
            title: 'Updated!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#DB6574'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#DB6574'
        });
    @endif
</script>

</body>
</html> --}}
