@extends('layouts.master')

@section('content-wrapper')
    <div class="row justify-content-center p-5">
        <div class="col-lg-6">
            <form action="/menu" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card border-dark mb-3">
                    <div class="card-header text-center">
                        <h3><b>Form Menu</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control @error('nama_menu') is-invalid @enderror"
                                id="nama_menu" name="nama_menu" value="{{ old('nama_menu') }}">
                            @error('nama_menu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gmbr_menu" class="form-label">Gambar Menu</label>
                            <input class="form-control" type="file" @error('gmbr_menu') is-invalid @enderror id="gmbr_menu" name="gmbr_menu" accept="image/*">
                            @error('gmbr_menu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" rows="3"></textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Tersedia">Ready</option>
                                <option value="Habis">Sold Out</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="container p-3">
                        <div class="row">
                            <a href="/menu" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                            <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Create</button>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
@endsection
