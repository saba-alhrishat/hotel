
<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{url('/home')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dashboard</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          <div class="list-inline-item">
            <a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
          
          
          </div>
     
          
          <!-- Log out               -->
          <div class="list-inline-item logout">                 
          
          


            <x-app-layout>
              

            </x-app-layout>

            </div>
        </div>
      </div>
    </nav>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> --}}


  </header>