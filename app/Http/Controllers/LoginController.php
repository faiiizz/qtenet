<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function registrasi(Request $request)
    {
        return view('registrasi');
    }
    public function registrasiProses(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => ' required|email|unique:users',
            'no_telp' => 'numeric',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
            'role' => 'in:owner,admin,karyawan',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $user = User::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>Hash::make($request->password_confirmation),
        ]);

        return redirect('/login')->with('success', 'Akun Sukses ditambahkan');
    }

    public function login()
    {
    	return view('login');
    }


    public function loginProses(Request $request)
    {
        // dd($request->all());
    	$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // create user
        $cek = $request->only('email', 'password');
        if(Auth::attempt($cek)){
            $request->session()->regenerate();
            $user = Auth::user(); // Mengambil pengguna yang sedang login
            session(['nama' => $user->nama]);
            session(['avatar' => $user->avatar]);
            return redirect('/dashboard')->with('success', 'Login Successfully');
        }
        return back()->withErrors([
            'email' =>  'These credentials do not match our records',
            'password' =>  'Password anda salah',
        ]);

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Terima Kasih');
}
}
