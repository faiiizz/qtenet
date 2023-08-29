@extends('layouts.master')
@section('content-wrapper')
    <div class="container p-4">
        {{-- @if (session()->has('pesan_tambah'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Data Berhasil di Tambah
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_edit'))
    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_hapus'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}

        <center>
            <h2>Pesanan</h2>
        </center>
        <table class="table table-striped my-4  text-center">
            <tr style="background-color: gray;">
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Pesanan</th>
                <th>jumlah</th>
                <th>Status</th>
                <th width="190px">Aksi</th>
            </tr>
            @foreach ($pesanans as $pesan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pesan->nama_pemesan}}</td>
                <td>
                    @foreach ($pesan->cart as $index => $cartItem)
                        {{$cartItem->menu->nama_menu}}
                        @if ($index < count($pesan->cart) - 1)
                            , <!-- Tambahkan koma jika bukan item terakhir -->
                        @endif
                    @endforeach
                </td>
                <td>{{$pesan->cart->sum('jumlah')}}</td>
                <td>{{$pesan->status}}</td>
                <td>
                    <a href="dapes/{{ $pesan->id }}/edit"  class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                </td>

            </tr>
@endforeach
        </table>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        {{ $pesanans->links('pagination::bootstrap-5') }}
    </div>
    {{-- <script type="text/javascript">
    $('.delete').click(function() {
        var menuid = $(this).attr('data-id');
        var nama_menu = $(this).attr('data-nama');

        Swal.fire({
            title: 'Yang Bener ?',
            text: "Kamu Mau Menghapus Menu dengan Nama "+nama_menu+" "+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location= "/menu/"+menuid+""
                Swal.fire(
                    'Deleted!',
                    'Menu Berhasil dihapus.',
                    'success'
                );
            }
        });
    });
</script> --}}
@endsection
