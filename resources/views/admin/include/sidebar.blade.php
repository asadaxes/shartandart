<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('/') }}assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile.edit') }}" class="d-block">{{auth()->user()->name}}</a>
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
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
                <i class="fa-solid fa-briefcase"></i>
              <p>
                Categories
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('sub-category.index') }}" class="nav-link">
                <i class="fa-solid fa-folder"></i>
              <p>
                Sub Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sub-sub-category.index') }}" class="nav-link">
                <i class="fa-solid fa-file"></i>
              <p>
                Sub Sub Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
                <i class="fa-brands fa-product-hunt"></i>
              <p>
               Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('order-admin.index') }}" class="nav-link">
                <i class="fa-solid fa-cart-shopping"></i>
              <p>
               Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link">
                <i class="fa-solid fa-address-book"></i>
              <p>
               Brand
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.index') }}" class="nav-link">
            <i class="fa-solid fa-layer-group"></i>
              <p>
               Blog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link">
                <i class="fa-solid fa-sliders"></i>
              <p>
               Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('atribute.index') }}" class="nav-link">
                <i class="fa-solid fa-inbox"></i>
              <p>
               Attribute
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.userlist') }}" class="nav-link">
                <i class="fa-solid fa-user"></i>
            <p>
            User List
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="fa-solid fa-gear"></i>
            <p>
            Settings
            </p>
            </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
