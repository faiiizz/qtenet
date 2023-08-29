<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        return view(
            'listuser.index',
            [
                'users' => User::paginate(6)
            ]
        );
    }

    public function create()
    {

        return view('listuser.create');
    }

    public function store(Request $request)
    { {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:5048',
                'password' => 'required',
                'no_hp' => 'required',
                'role' => 'required',
            ], [

                'nama.required' => 'Nama Harus Diisi',
                'avatar.required' => 'Avatar Harus Diisi',
                'email.required' => 'Email Harus Diisi',
                'password.required' => 'Password Harus Diisi',
                'avatar.image' => 'Avatar Harus Gambar',
                'avatar.mimes' => 'Avatar Harus Berformat jpeg,png,jpg,gif,svg',
                'avatar.max' => 'Avatar Maksimal 5MB',

            ]);

            $foto_file = $request->file('avatar');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $nama_foto = time() . '.' . $foto_ekstensi;
            $foto_file->move(public_path('images'), $nama_foto);

            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'avatar' => $nama_foto,
                'password' => Hash::make($request->password),
                'no_hp' => $request->no_hp,
                'role' => $request->role,
            ];



            User::create($data);
            return redirect('/listuser')->with('success', 'User Sukses ditambahkan');
        }
    }



    public function edit(User $user, $id)
    {
        $data = User::where('user_id', $id)->first();
        return view('listuser.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            'password' => 'required',
            'no_hp' => 'required',
            'role' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'avatar.required' => 'Avatar Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'avatar.image' => 'Avatar Harus Gambar',
            'avatar.mimes' => 'Avatar Harus Berformat jpeg, png, jpg, gif, svg',
            'avatar.max' => 'Avatar Maksimal 5MB',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ];

        if ($request->hasFile('avatar')) {
            $gambar = $request->file('avatar');
            $name = time() . '.' . $gambar->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $gambar->move($destinationPath, $name);

            $data_gambar = User::findOrFail($id);
            File::delete(public_path('images/' . $data_gambar->avatar));

            $data['avatar'] = $name;
        }

        User::where('user_id', $id)->update($data);
        return redirect('/listuser')->with('success', 'Data User berhasil diperbarui.');
    }



    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/listuser');
    }
}
