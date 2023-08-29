<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <form class="form-inline ml-25 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <li class="nav-item dropdown pe-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -23px">
                <img src={{ asset('images/'.session()->get('avatar') ) }} alt="Profile" class="rounded-circle" style="height: 45px;
                width: 45px;">
                <span>{{ Auth::user()->nama }}</span>
              </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                {{-- mensingkronisasi nama sesuai login --}}
                <h6>{{ Auth::user()->nama }}</h6>
                <span>{{ Auth::user()->role }}</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                @auth
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item d-flex align-items-center" type="submit">
                    <i class="nav-icon fas fa-lock p-2"></i>
                    <span>Logout</span>
                  </button>
                </form>
                @endauth
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li>
      </li>
    </ul>
  </nav>
