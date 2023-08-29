<aside class="main-sidebar sidebar-primary elevation-4" style="background-color: rgb(20, 20, 20);">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('AdminLTE') }}/dist/img/gambarqte.jpeg" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><h4>Qte-net kafe</h4></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/menu') }}" class="nav-link {{ Request::is('menu') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-utensils"></i>
                        <p>
                            Menu
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dapes') }}" class="nav-link {{ Request::is('dapes') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Pesanan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                @if (Auth::user()->role == 'admin')

                <li class="nav-item" hidden>
                    <a href="{{ url('/pendapatan') }}" class="nav-link {{ Request::is('pendapatan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Pendapatan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item" hidden>
                    <a href="{{ url('/dapes') }}" class="nav-link {{ Request::is('dapes') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Pesanan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @elseif(Auth::user()->role =='karyawan')
                <li class="nav-item" hidden>
                    <a href="{{ url('/pendapatan') }}" class="nav-link {{ Request::is('pendapatan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Pendapatan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item" hidden>
                    <a href="{{ url('/listuser') }}" class="nav-link {{ Request::is('listuser') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ url('/pendapatan') }}" class="nav-link {{ Request::is('pendapatan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Pendapatan
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/listuser') }}" class="nav-link {{ Request::is('listuser') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
