@extends('layout.layout')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @php
                $totalPrice = 0; // Inisialisasi variabel total harga
            @endphp

            @foreach ($cartItems as $cartItem)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('images') }}/{{ $cartItem->menu->gmbr_menu }}"
                                    width="100" height="100" class="img-responsive" /></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cartItem->menu->nama_menu }}</h4>
                            </div>
                        </div>
                    </td>
                    <td align="left">Rp. {{ number_format($cartItem->menu->harga) }}</td>
                    <td align="left">{{ $cartItem->total_jumlah }}</td>
                    <td align="left">Rp. {{ number_format($cartItem->menu->harga * $cartItem->total_jumlah) }}</td>
                    <td>
                        <form action="{{ url('cart/remove/' . $cartItem->menu_id) }}
                        "
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>

                @php
                    $totalPrice += $cartItem->menu->harga * $cartItem->total_jumlah; // Menambahkan harga item ke total harga
                @endphp
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total Rp.{{ number_format($totalPrice) }}</strong></h3>
                </td>
            </tr>
            <tr>
            <tr>
                <td colspan="5" style="text-align:right;">
                    <a href="/menufe/{{ $pesanan->id }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>
                        Continue
                        Shopping</a>
                    <a href="/checkout/{{ $pesanan->id }}" class="btn btn-success"> <i class="fa fa-money"></i>
                        Checkout</a>
                </td>
            </tr>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        (function() {
            const classnames = document.querySelectorAll('.jumlah');

            Array.from(classnames).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-item');
                    axios.patch(`/cart/${id}`, {
                            jumlah: this.value,
                            pesanan_id: id
                        })
                        .then(function(response) {
                            window.location.href =
                                `/cart/${id}`; // Menggunakan tanda kutip belakang (`) untuk interpolasi
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                });
            });
        })();
    </script>
@endsection


{{-- @extends('layoutspem.masterpem')
@section('contentpem-wrapper')
    <!-- Main content -->
    <section class="content">

        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Gambar</th>
                    <th style="width:10%">Harga</th>
                    <th style="width:8%">Jumlah</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += $details['harga'] * $details['jumlah'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Menu">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ url('images') }}/{{ $details['gmbr_menu'] }}" width="100"
                                            height="100" class="img-responsive" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="namamenu">{{ $details['nama_menu'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Harga">Rp{{ number_format($details['harga'], 0, ',', '.') }}</td>
                            <td data-th="Jumlah">
                                <input type="number" value="{{ $details['jumlah'] }}"
                                    class="form-control jumlah update_cart" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                Rp{{ number_format($details['harga'] * $details['jumlah'], 0, ',', '.') }}</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm remove-cart"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total Rp {{ number_format($total, 0, ',', '.') }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/menufe') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>
                            Continue Shopping</a>
                        <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".update_cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    jumlah: ele.parents("tr").find(".jumlah").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection --}}
