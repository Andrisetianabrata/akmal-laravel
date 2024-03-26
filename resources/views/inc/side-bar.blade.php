<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('keluar-masuk')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Data</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item {{request()->routeIs('keluar-masuk') ? 'active' : ''}}">
    <a class="nav-link" href="{{route('keluar-masuk')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Data Keluar/Masuk</span></a>
  </li>
  
  <li class="nav-item {{request()->routeIs('data-dempet') ? 'active' : ''}}">
    <a class="nav-link" href="{{route('data-dempet')}}">
    <i class="fas fa-fw fa-table"></i>
    <span>Data Dempet</span></a>
  </li>
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>