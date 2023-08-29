@extends('layouts.master')
@section('content-wrapper')
<title>User</title>
<div class=" row justify-content-center p-5">
    <div class="col-lg-6">
        <form action="/listuser/{{ $data->user_id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card border-dark mb-3">
                <div class="card-header text-center "><b>
                        <h3>
                            Form Edit User
                        </h3>
                    </b></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama',$data->nama)}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email',$data->email )}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        @if ($data->avatar)
                            <img style="max-width: 250px" src="{{ url('images').'/'.$data->avatar }}" alt="{{ $data->nama_foto }}"
                                class="img-thumbnail img-preview">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Avatar</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                            name="avatar" value="old('avatar',$data->avatar )" accept="image/*" autofocus>
                        @error('avatar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password',$data->password )}}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No.HP</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{old('no_hp',$data->no_hp )}}">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                            <option value="">- Pilih Role -</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                            <option value="karyawan" {{ old('role') === 'karyawan' ? 'selected' : '' }}>Karyawan</option>

                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
