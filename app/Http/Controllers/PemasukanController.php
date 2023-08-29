<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pemasukan beserta data pesanan yang terkait
    $pemasukans = Pemasukan::with('pesanan')->get();

    // Inisialisasi total pemasukan
    $totalPemasukan = 0;

    // Loop melalui data pemasukan untuk menghitung total
    foreach ($pemasukans as $pemasukan) {
        $totalPemasukan += $pemasukan->pesanan->jumlah_harga; // Mengambil jumlah_harga dari tabel pesanan
    }

    // Kirim data pemasukan dan total pemasukan ke tampilan
    return view('pemasukan.index', compact('pemasukans', 'totalPemasukan'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan)
    {
        //
    }
}
