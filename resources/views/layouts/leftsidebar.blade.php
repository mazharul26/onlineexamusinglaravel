<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-sm">
      <img src="{{ asset('alte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
   

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-1">
        <div class="input-group input-group-sm" data-widget="sidebar-search">
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
        <ul class="nav nav-pills- nav-legacy nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               @can('user-list')
             

          <li class="nav-item {{ session('lsbm') == 'user' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ session('lsbsm') == 'alluser' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link {{ session('lsbsm') == 'newuser' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
             
            </ul>
          </li>

     
          @endcan


          @can('role-list')
          <li class="nav-item {{ session('lsbm') == 'role' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Roles & Permissions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link {{ session('lsbsm') == 'allrole' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link {{ session('lsbsm') == 'newrole' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Role</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link {{ session('lsbsm') == 'allPermission' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permissions.create') }}" class="nav-link {{ session('lsbsm') == 'newPermission' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Permission</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('Exam-list')
          <li class="nav-item {{ session('lsbm') == 'exam' ? ' menu-open ' : '' }}">
            <a href="{{route('exam.index')}}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Exam List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @endcan
          @can('Exam-Question-list')
          <li class="nav-item {{ session('lsbm') == 'examquestion' ? ' menu-open ' : '' }}">
            <a href="{{route('examquestion.index')}}" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Exam Question List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @endcan
          @can('Student-Panel')
          <li class="nav-item {{ session('lsbm') == 'authstudentresult' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Student Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Student-Auth-Student-Result')
              <li class="nav-item">
                <a href="{{ route('onlyauthstudentresultshow') }}" class="nav-link {{ session('lsbsm') == 'allauthstudentresult' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Exam Result</p>
                </a>
              </li> 
              @endcan
              

              @can('Student-Admin-All-Student-Result')
              <li class="nav-item">
                <a href="{{ route('adminallstudentresultshow') }}" class="nav-link {{ session('lsbsm') == 'adminallstudentresultshow' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Exam Result List</p>
                </a>
              </li> 
              @endcan
            </ul>
          </li>
          @endcan
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>