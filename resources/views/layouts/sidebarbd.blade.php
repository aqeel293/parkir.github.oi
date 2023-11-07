
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <img src="/storage/foto/esip.jpg" alt="Deskripsi Gambar" width="100">
      {{-- <div class="sidebar-brand-text mx-3">PROSMADIS <sup></sup></div> --}}
    </a>
    
    <!-- Divider -->
    <div style="width: 100%; border-bottom: 1px solid #ccc; margin-top: 20px; margin-bottom: 20px;"></div>
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Route::currentRouteName() == 'bendahara.dashboard') active @endif">
      <a class="nav-link" href="{{ route('bendahara.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item @if(Route::currentRouteName() == 'bendahara') active @endif">
      <a class="nav-link" href="{{ route('bendahara') }}">
        <i class="fas fa-fw fa-landmark"></i>
        <span>Data Bendahara</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>