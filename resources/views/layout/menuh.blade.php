@extends('layout.layout')
@section('content')
    <div class="card card-solid ">
        <center>
            <h1>Menu</h1>
        </center>
        <div class="card-body pb-0">
            <div class="row">
                @foreach ($menus as $menu)
              @if($menu->status == 'Tersedia')
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 style="font-weight: bold" class="lead"><b>{{ $menu->nama_menu }}</b></h2>
                                        <p style="font-weight: bold" class="text-muted text-sm">{{ $menu->deskripsi }}</p>
                                        <p style="font-weight: bold" class="text-muted text-sm">{{ $menu->status }}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li style="font-weight: bold" class="small"><span class="fa-li"><i
                                                        class="fa fa-lg fa-money mr-3"></i></span>Rp
                                                {{ number_format($menu->harga, 0, ',', '.') }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        @if ($menu->gmbr_menu)
                                            <img id="myImg" src="{{ url('images') . '/' . $menu->gmbr_menu }}"
                                                alt="{{ $menu->gmbr_menu }}" img class="rounded-circle" width="120px"
                                                height="120px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary"  type="submit"><div class="fa fa-shopping-cart"> Tambah ke Keranjang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{-- {{ $menus->links('pagination::bootstrap-5') }} --}}
    </div>
@endsection
