


  <!-- باقي المحتوى -->
  {{-- <section class="no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="bar-chart block no-margin-bottom">
            <canvas id="barChartExample1"></canvas>
            
          </div>
          <div class="bar-chart block">
            <canvas id="barChartExample2"></canvas>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="line-cahrt block">
            <canvas id="lineCahrt"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section> --}}


{{-- 
@php
    $userPercentage = ($totalUsersCount > 0) 
        ? round(($newUsersCount / $totalUsersCount) * 100, 2)
        : 0;
@endphp


 @php
    // قيم افتراضية لجميع المتغيرات
    $newUsersCount = $newUsersCount ?? \App\Models\User::whereDate('created_at', today())->count();
    $totalUsersCount = $totalUsersCount ?? \App\Models\User::count();
    
    $newBookingsCount = $newBookingsCount ?? \App\Models\Booking::whereDate('created_at', today())->count();
    $totalBookingsCount = $totalBookingsCount ?? \App\Models\Booking::count();
    
    $newMessagesCount = $newMessagesCount ?? 0; // يمكنك استبدالها بطلب حقيقي للرسائل
    $newRoomsCount = $newRoomsCount ?? 0; // يمكنك استبدالها بطلب حقيقي للغرف
@endphp





<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">


      <h2 class="h5 no-margin-bottom" style="color: #DB6574">Dashboard</h2>
    </div>
  </div>


<section class="no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="statistic-block block d-flex align-items-center justify-content-between p-4"
             style="background: linear-gradient(135deg, #2b2b2b, #1a1a1a); border-radius: 12px; box-shadow: 0 0 15px rgba(255, 0, 0, 0.2);">
          <div class="d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center"
                 style="width: 60px; height: 60px; background: #ff4d4f; color: white; font-size: 28px; box-shadow: 0 0 10px rgba(255, 77, 79, 0.5);">
              👋
            </div>
            <div class="ms-4 text-white">
              <h4 class="mb-1">مرحبًا، {{ Auth::user()->name }}</h4>
              <p class="mb-0 text-muted" style="font-size: 14px;">يسعدنا وجودك في لوحة التحكم ✨</p>
            </div>
          </div>
          <div>
            <i class="fa fa-user-shield text-white" style="font-size: 32px;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">








        

<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
<div class="icon"><i class="fas fa-user"></i></div>
        <strong>New Users</strong>
      </div>
      <div class="number dashtext-2">{{ $newUsersCount }}</div>
    </div>
    <div class="progress progress-template">
      <div role="progressbar"
style="width: {{ ($totalUsersCount > 0 ? ($newUsersCount / $totalUsersCount * 100) : 0) }}%"
           class="progress-bar progress-bar-template dashbg-2"></div>
    </div>
  </div>
</div>
        
        <!-- شارت الحجوزات الجديدة -->
       
<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
<div class="icon"><i class="fas fa-calendar-check"></i></div>
                <strong>New Bookings</strong>
              </div>
              <div class="number dashtext-2">{{ $newBookingsCount }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" 
style="width: {{ ($totalBookingsCount > 0 ? ($newBookingsCount / $totalBookingsCount * 100) : 0) }}%"
                   class="progress-bar progress-bar-template dashbg-2"></div>
            </div>
          </div>
        </div>
        
      
<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
<div class="icon"><i class="fas fa-envelope"></i></div>
                <strong>New Messages</strong>
              </div>
              <div class="number dashtext-3">{{ $newMessagesCount }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" 
style="width: {{ ($newMessagesCount > 0 ? 55 : 0) }}%"
                   class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>


        
<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
<div class="icon"><i class="fas fa-bed"></i></div>
                <strong>New Rooms</strong>
              </div>
              <div class="number dashtext-3">{{ $newRoomsCount }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" 
style="width: {{ ($newRoomsCount > 0 ? 55 : 0) }}%"
                   class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  



</div> --}}








{{-- ***************** --}}







{{-- 
@php
    $userPercentage = ($totalUsersCount > 0) 
        ? round(($newUsersCount / $totalUsersCount) * 100, 2)
        : 0;
@endphp

@php
    // قيم افتراضية لجميع المتغيرات
    $newUsersCount = $newUsersCount ?? \App\Models\User::whereDate('created_at', today())->count();
    $totalUsersCount = $totalUsersCount ?? \App\Models\User::count();
    
    $newBookingsCount = $newBookingsCount ?? \App\Models\Booking::whereDate('created_at', today())->count();
    $totalBookingsCount = $totalBookingsCount ?? \App\Models\Booking::count();
    
    $newMessagesCount = $newMessagesCount ?? 0;
    $newRoomsCount = $newRoomsCount ?? 0;
@endphp

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom" style="color: #DB6574; font-weight: 600; letter-spacing: 0.5px;">Dashboard</h2>
        </div>
    </div>

    <!-- بطاقة الترحيب الفاخرة -->
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="welcome-card card border-0 p-4" 
                         style="background: linear-gradient(135deg, #1e1e2f, #2a2a3a); 
                                border-radius: 16px; 
                                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                                position: relative;
                                overflow: hidden;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="avatar-container me-4" 
                                     style="width: 70px; height: 70px; 
                                            background: linear-gradient(45deg, #ff4d4f, #db6574);
                                            border-radius: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            box-shadow: 0 5px 15px rgba(255, 77, 79, 0.4);">
                                    <i class="fas fa-crown text-white" style="font-size: 28px;"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 text-white" style="font-weight: 600;">مرحبًا، {{ Auth::user()->name }}</h4>
                                    <p class="mb-0" style="color: rgba(255,255,255,0.7); font-size: 14px;">
                                        لوحة تحكم إدارية متكاملة لإدارة نظامك بكل سهولة
                                    </p>
                                </div>
                            </div>
                            <div class="sparkle-icon" style="font-size: 36px; color: rgba(255,255,255,0.1);">
                                <i class="fas fa-sparkles"></i>
                            </div>
                        </div>
                        <div class="corner-decoration" 
                             style="position: absolute; 
                                    bottom: -20px; 
                                    right: -20px; 
                                    width: 100px; 
                                    height: 100px; 
                                    border-radius: 50%;
                                    background: rgba(219, 101, 116, 0.1);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- بطاقات الإحصائيات الفاخرة -->
    <section class="no-padding-top no-padding-bottom mt-4">
        <div class="container-fluid">
            <div class="row g-4">
                <!-- بطاقة المستخدمين -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: linear-gradient(135deg, #2a2a3a, #1e1e2f);
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;
                                overflow: hidden;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(74, 195, 110, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-user text-success" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: rgba(255,255,255,0.6); font-size: 12px; font-weight: 600;">المستخدمون الجدد</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newUsersCount }}</h3>
                                </div>
                             <div class="percentage-badge"
     style="background: rgba(74, 195, 110, 0.2); 
            color: #4ac36e;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;">
+{{ ($totalUsersCount > 0 ? round(($newUsersCount / $totalUsersCount) * 100, 2) : 0) }}%
</div>
                            </div>
                            <div class="progress mt-3" style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px;">
                                <div class="progress-bar bg-success" 
                                     role="progressbar" 
                                     style="width: {{ ($totalUsersCount > 0 ? ($newUsersCount / $totalUsersCount * 100) : 0) }}%" 
                                     aria-valuenow="{{ ($totalUsersCount > 0 ? ($newUsersCount / $totalUsersCount * 100) : 0) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">من إجمالي</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalUsersCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الحجوزات -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: linear-gradient(135deg, #2a2a3a, #1e1e2f);
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(86, 156, 214, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-calendar-check text-primary" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: rgba(255,255,255,0.6); font-size: 12px; font-weight: 600;">الحجوزات الجديدة</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newBookingsCount }}</h3>
                                </div>
                                <div class="percentage-badge" 
                                     style="background: rgba(86, 156, 214, 0.2); 
                                            color: #569cd6;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            font-size: 12px;
                                            font-weight: 600;">
                                    +{{ ($totalBookingsCount > 0 ? round(($newBookingsCount / $totalBookingsCount) * 100, 2) : 0 }}%
                                </div>
                            </div>
                            <div class="progress mt-3" style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px;">
                                <div class="progress-bar bg-primary" 
                                     role="progressbar" 
                                     style="width: {{ ($totalBookingsCount > 0 ? ($newBookingsCount / $totalBookingsCount * 100) : 0) }}%" 
                                     aria-valuenow="{{ ($totalBookingsCount > 0 ? ($newBookingsCount / $totalBookingsCount * 100) : 0) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">من إجمالي</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalBookingsCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الرسائل -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: linear-gradient(135deg, #2a2a3a, #1e1e2f);
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(255, 178, 54, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-envelope text-warning" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: rgba(255,255,255,0.6); font-size: 12px; font-weight: 600;">الرسائل الجديدة</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newMessagesCount }}</h3>
                                </div>
                                <div class="percentage-badge" 
                                     style="background: rgba(255, 178, 54, 0.2); 
                                            color: #ffb236;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            font-size: 12px;
                                            font-weight: 600;">
                                    +{{ ($newMessagesCount > 0 ? 55 : 0) }}%
                                </div>
                            </div>
                            <div class="progress mt-3" style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px;">
                                <div class="progress-bar bg-warning" 
                                     role="progressbar" 
                                     style="width: {{ ($newMessagesCount > 0 ? 55 : 0) }}%" 
                                     aria-valuenow="{{ ($newMessagesCount > 0 ? 55 : 0) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">من إجمالي</small>
                                <small class="text-white" style="font-weight: 600;">{{ $newMessagesCount + rand(10, 50) }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بطاقة الغرف -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: linear-gradient(135deg, #2a2a3a, #1e1e2f);
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(159, 122, 234, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-bed text-purple" style="font-size: 20px; color: #9f7aea;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: rgba(255,255,255,0.6); font-size: 12px; font-weight: 600;">الغرف الجديدة</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newRoomsCount }}</h3>
                                </div>
                                <div class="percentage-badge" 
                                     style="background: rgba(159, 122, 234, 0.2); 
                                            color: #9f7aea;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            font-size: 12px;
                                            font-weight: 600;">
                                    +{{ ($newRoomsCount > 0 ? 55 : 0) }}%
                                </div>
                            </div>
                            <div class="progress mt-3" style="height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px;">
                                <div class="progress-bar" 
                                     role="progressbar" 
                                     style="width: {{ ($newRoomsCount > 0 ? 55 : 0) }}%; background-color: #9f7aea;" 
                                     aria-valuenow="{{ ($newRoomsCount > 0 ? 55 : 0) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">من إجمالي</small>
                                <small class="text-white" style="font-weight: 600;">{{ $newRoomsCount + rand(5, 20) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    
    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(219, 101, 116, 0.1);
        z-index: 0;
    }
    
    .welcome-card::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(219, 101, 116, 0.05);
        z-index: 0;
    }
</style> --}}












{{-- ***************** --}}








@php
    // Default values for all variables
    $newUsersCount = $newUsersCount ?? \App\Models\User::whereDate('created_at', today())->count();
    $totalUsersCount = $totalUsersCount ?? \App\Models\User::count();
    
    $newBookingsCount = $newBookingsCount ?? \App\Models\Booking::whereDate('created_at', today())->count();
    $totalBookingsCount = $totalBookingsCount ?? \App\Models\Booking::count();
    
    $newMessagesCount = $newMessagesCount ?? \App\Models\Contact::whereDate('created_at', today())->count();
    $totalMessagesCount = $totalMessagesCount ?? \App\Models\Contact::count();
    
    $newRoomsCount = $newRoomsCount ?? \App\Models\Room::whereDate('created_at', today())->count();
    $totalRoomsCount = $totalRoomsCount ?? \App\Models\Room::count();
@endphp


<br>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom" style="color: #DB6574; font-weight: 600; letter-spacing: 0.5px;">Dashboard</h2>
        </div>
    </div>

    <!-- Welcome Card -->
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="welcome-card card border-0 p-4" 
                         style="background: linear-gradient(135deg, #2d30359e, #1a1a1d84); 
                                border-radius: 16px; 
                                box-shadow: 0 10px 30px rgba(245, 179, 179, 0.3);
                                position: relative;
                                overflow: hidden;">
                        <div class="d-flex align-items-center justify-content-between" >
                            <div class="d-flex align-items-center">
                                <div class="avatar-container me-4" 
                                     style="width: 70px; height: 70px; 
                                            background: #DB6574;
                                            border-radius: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            box-shadow: 0 5px 15px rgba(219, 101, 116, 0.4);">
                                    <i class="fas fa-hotel text-white" style="font-size: 28px;"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 text-white" style="font-weight: 600;">Welcome, {{ Auth::user()->name }}</h4>
                                    <p class="mb-0" style="color: #8a8d93; font-size: 14px;">
                                        Hotel Management System - Everything under your control
                                    </p>
                                </div>
                            </div>
                            <div class="sparkle-icon" style="font-size: 36px; color: rgba(219, 101, 116, 0.3);">
                                <i class="fas fa-sparkles"></i>
                            </div>
                        </div>
                        <div class="corner-decoration" 
                             style="position: absolute; 
                                    bottom: -20px; 
                                    right: -20px; 
                                    width: 100px; 
                                    height: 100px; 
                                    border-radius: 50%;
                                    background: rgba(219, 101, 116, 0.1);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Cards -->
    <section class="no-padding-top no-padding-bottom mt-4">
        <div class="container-fluid">
            <div class="row g-4">
                <!-- Users Card -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: #2d3035;
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;
                                overflow: hidden;
                                  box-shadow: 0 5px 5px #DB6574!important;

                                border-left: 4px solid #DB6574;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(219, 101, 116, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                          
                                                justify-content: center;">
                                        <i class="fas fa-users text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: #8a8d93; font-size: 12px; font-weight: 600;">NEW USERS</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newUsersCount }}</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <small style="color: #8a8d93;">Total Users</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalUsersCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bookings Card -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: #2d3035;
                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;
                                  box-shadow: 0 5px 5px #DB6574!important;

                                border-left: 4px solid #8a8d93;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(138, 141, 147, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-calendar-check text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: #8a8d93; font-size: 12px; font-weight: 600;">NEW BOOKINGS</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newBookingsCount }}</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <small style="color: #8a8d93;">Total Bookings</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalBookingsCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages Card -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: #2d3035;
                                  box-shadow: 0 5px 5px #DB6574!important;

                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;
                                border-left: 4px solid #DB6574;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(219, 101, 116, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-envelope text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: #8a8d93; font-size: 12px; font-weight: 600;">NEW MESSAGES</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newMessagesCount }}</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <small style="color: #8a8d93;">Total Messages</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalMessagesCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rooms Card -->
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card card border-0 h-100" 
                         style="background: #2d3035;
                                  box-shadow: 0 5px 5px #DB6574!important;

                                border-radius: 16px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                                transition: all 0.3s ease;
                                border-left: 4px solid #8a8d93;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="icon-container mb-3" 
                                         style="width: 50px; 
                                                height: 50px; 
                                                background: rgba(138, 141, 147, 0.2); 
                                                border-radius: 12px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;">
                                        <i class="fas fa-bed text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-1" style="color: #8a8d93; font-size: 12px; font-weight: 600;">NEW ROOMS</h6>
                                    <h3 class="mb-0 text-white" style="font-weight: 700;">{{ $newRoomsCount }}</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <small style="color: #8a8d93;">Total Rooms</small>
                                <small class="text-white" style="font-weight: 600;">{{ $totalRoomsCount }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    
    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(219, 101, 116, 0.1);
        z-index: 0;
    }
    
    body {
        background-color: #1e1e22;
        color: #ffffff;
    }
</style>









