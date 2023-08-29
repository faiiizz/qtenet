<!DOCTYPE html>
<html>

<head>
    <title>Qte-net kafe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/styles.css') }}">
    <style>
        .text-right {
            text-align: right;
        }

        .dropdown-menu-right {
            right: 0;
            left: auto;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="">Qte-net kafe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
            <a class="btn btn-outline-dark" href="/cart/{{$pesanan->id}}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                    class="badge bg-danger">{{ count($pesanan->cart) }}</span>
            </a>
        </div>
    </nav>
    {{-- <a class="btn btn-primary" href="{{ route('cart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">({{count((array) session('cart'))}})</span>
    </a> --}}


    <br />
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>


{{-- @extends('layoutspem.masterpem')
@section('contentpem-wrapper')

      <!-- Default box -->
      <div class="card card-solid ">
        <center><h1>Menu</h1></center>
        <div class="card-body pb-0">
          <div class="row">
           @foreach ($menus as $menu)
           <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 style="font-weight: bold" class="lead"><b>{{ $menu->nama_menu }}</b></h2>
                    <p style="font-weight: bold" class="text-muted text-sm">{{ $menu->deskripsi }}</p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li style="font-weight: bold" class="small"><span class="fa-li"><i class="fas fa-lg fa-money-bill-wave mr-3"></i></span>Rp {{ number_format($menu->harga, 0, ',', '.') }}</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    @if ($menu->gmbr_menu)
                    <img id="myImg"
                        src="{{ url('images') . '/' . $menu->gmbr_menu }}"
                        alt="{{ $menu->gmbr_menu }}" img class="rounded-circle" width="120px" height="120px">
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="menufe/{{ $menu->id }}" class="btn btn-warning mr-1">
                    <div class="fas fa-solid fa-info-circle">
                      Detail
                    </div>
                  </a>
                  <a href="{{ route('add_to_cart', $menu->id)}}" class="btn btn-primary">
                    <div class="fas fa-shopping-cart">
                      Add to Keranjang
                    </div>
                  </a>
                </div>
              </div>
        </div>
          </div>
            @endforeach
        </div>
        </div>
        {{ $menus->links('pagination::bootstrap-5') }}
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection --}}
