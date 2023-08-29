@extends('layouts.master')
@section('content-wrapper')
    <div class=" row justify-content-center p-5">
        <div class="col-lg-6">
            <form method="post" action="/menu/{{ $menus->id }}">
                @method('PUT')
                @csrf
                <div class="card border-dark mb-3">
                    <div class="card-header text-center "><b>
                            <h3>
                                Edit Menu
                            </h3>
                        </b></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $menus->deskripsi) }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                <option value="">- Pilih -</option>
                                <option value="Tersedia" {{ old('status', $menus->status) == 'Tersedia' ? 'selected' : '' }}>Ready</option>
                                <option value="Soldout" {{ old('status', $menus->status) == 'Soldout' ? 'selected' : '' }}>Sold Out</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga', $menus->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="container p-3">
                            <div class="row">
                                <a href="/menu" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                                <button type="submit" name="submit"
                                    class="btn btn-success col-md-3 offset-md-8 mt-3">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
