@extends('layouts.master')
@section('content-wrapper')
    <div class=" row justify-content-center p-5">
        <div class="col-lg-6">
            <form method="post" action="/dapes/{{ $pesanans->id }}">
                @method('PUT')
                @csrf
                <div class="card border-dark mb-3">
                    <div class="card-header text-center "><b>
                            <h3>
                                Edit Pesanan
                            </h3>
                        </b></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="">- Pilih -</option>
                                <option value="Sudah Bayar">Sudah Bayar</option>
                                <option value="Sudah Diantarkan">Sudah Diantarkan</option>
                            </select>
                        </div>
                        <div class="container p-3">
                            <div class="row">
                                <a href="/dapes" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

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
