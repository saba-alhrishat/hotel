

<header class="header">   
    <nav class="navbar navbar-expand-lg">

      {{-- search --}}


      {{-- <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
         <form id="searchForm" action="{{ route('admin.search') }}" method="GET">
  <div class="form-group">
    <input type="search" name="search" placeholder="What are you searching for..." required>

    
    <button type="submit" class="submit">Search</button>
  </div>
</form>
        </div>
      </div> --}}








      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{url('/home')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dashboard</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          {{-- <div class="list-inline-item">
            <a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
          
          
          </div> --}}
     
          
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

  


  <script>
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', () => {
      const query = searchInput.value.toLowerCase();
      const allElements = document.querySelectorAll('body *:not(script):not(style)');

      allElements.forEach(el => {
        if (el.children.length === 0 && el.textContent.trim() !== "") {
          const text = el.textContent.toLowerCase();
          if (text.includes(query) || query === "") {
            el.classList.remove('hidden');
          } else {
            el.classList.add('hidden');
          }
        }
      });
    });
  </script>
