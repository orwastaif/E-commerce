<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.logout')}}" class="nav-link">Logout</a>
      </li>
    </ul>
      
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Admin Panel</a>
        </div>
      </div>

   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" ></a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ecommerce')}}" class="nav-link">
                  <p>Shop</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="{{ route('products')}}" class="nav-link">
                 <p>Add Product</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{ route('product.list')}}" class="nav-link">
                <p>Manage Products</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Orders') }}" class="nav-link">
                <p>Orders</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>