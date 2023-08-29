<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pilih Meja</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 12px;
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .mb-3 {
        margin-bottom: 20px; /* Anda bisa menyesuaikan jumlah piksel sesuai kebutuhan Anda */
    }
    </style>

</head>

<body>
    <div class="container">
        <h2>Pilih Meja</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('input_kode_meja_procces') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                    id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
                @error('nama_pemesan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label for="kode_meja">Kode Meja</label>
            <select id="kode_meja" name="kode_meja">
                <option value="">- Pilih -</option>
                <option value="Bambu 1">B1</option>
                <option value="Bambu 2">B2</option>
                <option value="Bambu 3">B3</option>
                <option value="Bambu 4">B4</option>
                <option value="Kaca 1">K1</option>
                <option value="Kaca 2">K2</option>
                <option value="Kaca 3">K3</option>
                <option value="Kaca 4">K4</option>
                <option value="Pojok Kaca">PK</option>
                <option value="Bulat Petak">BP</option>
                <option value="Pojok Musholla">PM</option>
                <option value="Pojok Lampu">PL</option>
                <option value="Tapsu Tiang">TT</option>
                <option value="Samping Kasir">SK</option>
            </select>
            <button type="submit">Pesan Meja</button>
        </form>
    </div>
</body>

</html>
























{{-- @extends('layout.layout')
@section('content')
    <title>Pilih Meja</title>
    <div class=" row justify-content-center p-5">
        <div class="col-lg-6">
            <form action="/checkout" method="post">

                @csrf
                <div class="card border-dark mb-3">
                    <div class="card-header text-center "><b>
                            <h3>
                                Pilih Meja
                            </h3>
                        </b></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kode Meja</label>
                            <select name="kode_meja" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="Bambu 1">B1</option>
                                <option value="Bambu 2">B2</option>
                                <option value="Bambu 3">B3</option>
                                <option value="Bambu 4">B4</option>
                                <option value="Kaca 1">K1</option>
                                <option value="Kaca 2">K2</option>
                                <option value="Kaca 3">K3</option>
                                <option value="Kaca 4">K4</option>
                                <option value="Pojok Kaca">PK</option>
                                <option value="Bulat Petak">BP</option>
                                <option value="Pojok Musholla">PM</option>
                                <option value="Pojok Lampu">PL</option>
                                <option value="Tapsu Tiang">TT</option>
                                <option value="Samping Kasir">SK</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                                id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
                            @error('nama_pemesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="container p-3">
                        <div class="row">
                            <a href="{{ route('cart') }}" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                            <button type="submit" name="submit"
                                class="btn btn-success col-md-3 offset-md-8 mt-3" >Pembayaran</button>
                        </div>
                    </div>
                </div>
        </div>

        </form>
    </div>

    </div>
@endsection --}}
