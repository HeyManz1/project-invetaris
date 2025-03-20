{{-- Link Pages Sidebar --}}
@php
  $menus = [
      (object)[
        "title" => "Dasboard",
        "path" => "/",
        "icon" => "fas fa-columns",
    ],
      (object)[
        "title" => "Kategori",
        "path" => "categories",
        "icon" => "fas fa-folder",
    ],
      (object)[
        "title" => "Product",
        "path" => "/products",
        "icon" => "fas fa-shopping-cart",
    ],

  ];
@endphp
{{-- End Link Pages Sidebar --}}

<style>
  .brand-link {
  display: flex;
  align-items: center;
  justify-content: center;
   }

  .brand-image {
      transition: all 0.3s ease-in-out;
  }

  .sidebar-mini .brand-image {
      width: 35px; /* Mengecilkan logo saat sidebar dikecilkan */
      max-height: 35px;
  }

</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo Icons8 -->
    <a href="#" class="brand-link">
      <img src="{{ asset('asset/Logo.png') }}" alt="Logo" 
           class="brand-image img-circle elevation-3" 
           style="max-height: 50px; width: auto;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- Link yang menampilkan nama pengguna yang sedang login -->
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ( $menus as $menu )
            <li class="nav-item ">
              <a href="{{ $menu->path[0] !== '/' ? '/' . $menu ->path : $menu ->path }}" class="nav-link 
                {{ request()->path()=== $menu->path ? 'active' : '' }}">
                <i class="nav-icon {{ $menu ->icon }}"></i>
                <p>
                  {{ $menu ->title }}
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>