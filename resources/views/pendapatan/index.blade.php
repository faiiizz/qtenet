@section('title', 'Pendapatan')
@extends('layouts.master')
@section('content-wrapper')
    <div class="container p-4">
        {{-- Pesan sukses atau error bisa ditambahkan di sini --}}
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
            <h2>Pendapatan</h2>
        </center>
        <!-- /.card -->

        <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Meja</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($pesanans as $masuk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $masuk->kode_meja }}</td>
                                <td>{{ $masuk->nama_pemesan }}</td>
                                <td>{{ $masuk->created_at->format('d/m/Y') }}</td>
                                <td>{{ $masuk->status }}</td>
                                <td>Rp.{{ number_format($masuk->jumlah_harga) }}</td>
                            </tr>
                            @php
                                $total += $masuk->jumlah_harga;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="right"><strong class="total-cell">Total :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($total) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{ $pesanans->links('pagination::bootstrap-5') }}
    </div>
@endsection

   {{-- <a class="btn btn-default" href="/pendapatan-pdf" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a> --}}
        {{-- <table class="table table-striped my-4 text-center">
            <thead style="background-color: gray;">
                <tr>
                    <th>No</th>
                    <th>Kode Meja</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($pesanans as $masuk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $masuk->kode_meja }}</td>
                        <td>{{ $masuk->nama_pemesan }}</td>
                        <td>{{ $masuk->created_at->format('d/m/Y') }}</td>
                        <td>{{ $masuk->status }}</td>
                        <td>Rp.{{ number_format($masuk->jumlah_harga) }}</td>
                    </tr>
                    @php
                        $total += $masuk->jumlah_harga;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="right"><strong class="total-cell">Total :</strong></td>
                    <td align="right"><strong>Rp. {{ number_format($total) }}</strong></td>
                </tr>
            </tfoot>
        </table> --}}
