@extends('layouts.master')
@section('content-wrapper')
<title>User</title>
<div class=" row justify-content-center p-5">
    <div class="col-lg-6">
        <form action="/listuser" method="post" enctype="multipart/form-data">

            @csrf
            <div class="card border-dark mb-3">
                <div class="card-header text-center "><b>
                        <h3>
                            Form User
                        </h3>
                    </b></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input class="form-control" type="file" @error('avatar') is-invalid @enderror id="avatar" name="avatar" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No.HP</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="admin">admin</option>
                            <option value="karyawan">karyawan</option>
                        </select>
                    </div>
                </div>

                <div class="container p-3">
                    <div class="row">
                        <a href="/listuser" class="btn btn-outline-danger col-md-3 offset-md-8">Kembali</a>

                        <button type="submit" name="submit" class="btn btn-success col-md-3 offset-md-8 mt-3">Create</button>
                    </div>
                </div>
            </div>
    </div>

    </form>
</div>

</div>

@endsection
