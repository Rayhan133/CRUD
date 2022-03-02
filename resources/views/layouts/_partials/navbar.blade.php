<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-flex">
            <p class="text-capitalize mt-2 font-weight-bold" style="color:#120a859a">{{auth()->user()->roles[0]->name}}
            </p>
            <a class="nav-link" href="{{ route('user.logout') }}" role="button">
                <i class="fas fa-power-off"></i>
            </a>
        </li>
    </ul>
</nav>
