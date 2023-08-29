@section('title', 'Menu')
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
            <h2>Menu</h2>
        </center>
        <a href="/menu/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Menu</a>
        <table class="table table-striped my-4  text-center">
            <tr style="background-color: gray;">
                <th>No</th>
                <th>Nama Menu</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Harga</th>
                <th width="190px">Aksi</th>
            </tr>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>
                        @if ($menu->gmbr_menu)
                            <img id="myImg" src="{{ url('images') . '/' . $menu->gmbr_menu }}" alt="{{ $menu->gmbr_menu }}"
                                style="max-width:80px">
                        @endif
                    </td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td>{{ $menu->status }}</td>
                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="menu/{{ $menu->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                        <form action="menu/{{ $menu->id }}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" data-id="{{ $menu->id }}"
                                data-nama="{{ $menu->nama_menu }}"onclick="return confirm('Yakin Ingin Menghapus Data ?')">
                                <i class="fa fa-trash"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        {{ $menus->links('pagination::bootstrap-5') }}
    </div>
    <script type="text/javascript">
        $('.delete').click(function() {
            var menuid = $(this).attr('data-id');
            var nama_menu = $(this).attr('data-nama');

            Swal.fire({
                title: 'Yang Bener ?',
                text: "Kamu Mau Menghapus Menu dengan Nama " + nama_menu + " " + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/menu/" + menuid + ""
                    Swal.fire(
                        'Deleted!',
                        'Menu Berhasil dihapus.',
                        'success'
                    );
                }
            });
        });
    </script>
@endsection
