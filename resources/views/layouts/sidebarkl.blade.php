
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <img src="/storage/foto/esip.jpg" alt="Deskripsi Gambar" width="100">
      {{-- <div class="sidebar-brand-text mx-3">PROSMADIS <sup></sup></div> --}}
    </a>
    
    <!-- Divider -->
    <div style="width: 100%; border-bottom: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;"></div>

    <li class="nav-item @if(Route::currentRouteName() == 'kolektor') active @endif">
      <a class="nav-link" href="{{ route('kolektor') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Korlap</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>