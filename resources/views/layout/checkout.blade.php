<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-bg-success mb-3 mt-3">
                    <div class="card-header"><h4>Sukses Check Out</h4></div>
                    <div class="card-body">

                      <h6>Pesanan {{ $pesanan->nama_pemesan }} sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di
                        DANA <strong>Dengan Nomor : 085263330353</strong> dengan nominal :
                        <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong>
                    </h6>
                    </div>
                  </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                        @if (!empty($pesanan))
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($cartItems as $cartItem)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <div class="col-sm-3 hidden-xs"><img
                                                        src="{{ url('images') }}/{{ $cartItem->menu->gmbr_menu }}"
                                                        width="100" height="100" class="img-responsive" /></div>
                                                <div class="col-sm-9">
                                            </td>
                                            <td>{{ $cartItem->menu->nama_menu }}</td>
                                            <td class="mr-5">{{ $cartItem->total_jumlah }} </td>
                                            <td align="left">Rp. {{ number_format($cartItem->menu->harga) }}
                                            </td>
                                            <td align="left">Rp. {{ number_format($cartItem->menu->harga * $cartItem->total_jumlah) }}
                                            </td>

                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="5" align="right"><strong>Total :</strong></td>
                                        <td align="right"><strong>Rp.
                                                {{ number_format($pesanan->jumlah_harga) }}</strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
