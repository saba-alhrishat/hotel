{{-- 

@php
    // قيم افتراضية في حالة عدم وجود المتغيرات
    $newUsersCount = $newUsersCount ?? 0;
    $totalUsersCount = $totalUsersCount ?? 1; // 1 لتجنب القسمة على الصفر

@endphp 



@php

    $percentage = ($totalBookingsCount > 0) 
        ? ($newBookingsCount / $totalBookingsCount * 100) 
        : 0;
@endphp



<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">


      <h2 class="h5 no-margin-bottom" style="color: #DB6574">Dashboard</h2>
    </div>
  </div>
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">



<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
                <div class="icon"><i class="icon-user-1"></i></div>
                <strong>New Users</strong>
            </div>
            <div class="number dashtext-2">{{ $newUsers = \App\Models\User::whereDate('created_at', today())->count() }}</div>
        </div>
        <div class="progress progress-template">
            <div role="progressbar"
                 style="width: {{ ($newUsers / max(1, \App\Models\User::count())) * 100 }}%"
                 class="progress-bar progress-bar-template dashbg-2">
            </div>
        </div>
    </div>
</div>




<div class="col-md-3 col-sm-6">
    <div class="statistic-block block">
        <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
                <div class="icon"><i class="icon-contract"></i></div>
                <strong>New Bookings</strong>
            </div>
            <div class="number dashtext-2">{{ $newBookingsCount ?? 0 }}</div>
        </div>
        <div class="progress progress-template">
            <div role="progressbar"
                 style="width: {{ ($totalBookingsCount > 0 ? ($newBookingsCount / $totalBookingsCount * 100) : 0) }}%"
                 aria-valuenow="{{ $newBookingsCount ?? 0 }}"
                 aria-valuemin="0"
                 aria-valuemax="{{ $totalBookingsCount ?? 100 }}"
                 class="progress-bar progress-bar-template dashbg-2">
            </div>
        </div>
    </div>
</div>



        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>New messages</strong>
              </div>
              <div class="number dashtext-3">140</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>
        
    
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>New Rooms</strong>
              </div>
              <div class="number dashtext-3">140</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>












    
  <section class="no-padding-bottom">
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
  </section>


 --}}





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
  



  <!-- باقي المحتوى -->
  <section class="no-padding-bottom">
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
  </section>




</div>
