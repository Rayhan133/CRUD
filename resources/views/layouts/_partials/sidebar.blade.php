<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
    </a>

    <!-- Sidebar -->
    <div class=" sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="default avatar">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize">{{ Auth::user()->name }}</a>
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
                    <a href="{{ route('user.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- This menu for multiple linking system --}}
                {{-- Product menus --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-folder"></i>
                        {{-- file icon --}}
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.user.listView') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.register')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        @endrole
                        @role('user')
                        <li class="nav-item">
                            <a href="{{ route('user.fileUploadIndex') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>File Upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.fileAndGroupInfo') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>File & Group Info</p>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
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
