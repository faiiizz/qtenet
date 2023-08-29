<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPesanan = Pesanan::count();
        $jumlahUser = User::count();
        $totalPendapatan = Pesanan::whereMonth('created_at', now()->month)->sum('jumlah_harga');

        return view('dashboard.index', compact('jumlahPesanan','totalPendapatan','jumlahUser'));
    }

}
