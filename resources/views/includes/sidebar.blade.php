<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin-Panel</span>
      <br>
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-circle-minus"></i>
              <p>
                Tasks
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{route('tasks.create')}}" class="nav-link">
                  <i class="far fa-circle fa-r"></i>
                  <p>Add New</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('tasks.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ALL Tasks</p>
                </a>
              </li>
              
              
              
            </ul>
          </li>
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>