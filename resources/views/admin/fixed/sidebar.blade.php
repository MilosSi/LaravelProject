<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset("assets/images/logo/logo.png")}}" alt="Cactus Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Cactus</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">

      </div>
      <div class="info">
        <a href="#" class="d-block">{{session('user')->username}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/admin/home" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Home
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="/admin/products" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Products

            </p>
          </a>
        </li>
        <li class="nav-item">
              <a href="/admin/orders" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                      Orders
                      <span class="right badge badge-danger">New</span>
                  </p>
              </a>
          </li>
        <li class="nav-item">
              <a href="/admin/collections" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                      Collections
                      <span class="right badge badge-danger">New</span>
                  </p>
              </a>
          </li>
        <li class="nav-item">
              <a href="/admin/categories" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                      Categories
                  </p>
              </a>
          </li>
        <li class="nav-item">
          <a href="/admin/tags" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Tags

            </p>
          </a>
        </li>
          <li class="nav-item">
              <a href="/admin/newsletter" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                      Newsletter

                  </p>
              </a>
          </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
