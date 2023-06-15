
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::guard('doctor')->check())
                @if (Auth::guard('doctor')->user()->imageww)
                <img src="{{asset('uploads/Doctors/'.Auth::guard('doctor')->user()->image)}}" class="img-fluid" width="90" height="50" alt="">
                @else
                <img src="{{asset('Assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                @endif
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if (Auth::guard('doctor')->check())
                {{Auth::guard('doctor')->user()->name}}
            @endif
        </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-user"></i>
              <p>
                Patients
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctor.patients.all')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                  <p>All Patients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doctor.patients.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
            </ul>
        </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                  <p>
                    Examination
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('doctor.examination.all')}}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                      <p>All Examination</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('doctor.examination.create')}}" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                      <p>Add Examination</p>
                    </a>
                  </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
