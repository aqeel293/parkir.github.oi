
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <img src="/storage/foto/logo.png" alt="Deskripsi Gambar" width="200">
    {{-- <div class="sidebar-brand-text mx-3">PROSMADIS <sup></sup></div> --}}
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item @if(Route::currentRouteName() == 'dashboard') active @endif">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item @if(Route::currentRouteName() == 'bendahara') active @endif">
    <a class="nav-link" href="{{ route('bendahara') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Data Bendahara</span></a>
  </li>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var navItems = document.querySelectorAll('.nav-item');
  
      navItems.forEach(function(navItem) {
        navItem.addEventListener('click', function() {
          // Hapus kelas 'active' dari semua elemen
          navItems.forEach(function(item) {
            item.classList.remove('active');
          });
  
          // Tambahkan kelas 'active' ke elemen yang diklik
          this.classList.add('active');
        });
      });
    });
  </script>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>