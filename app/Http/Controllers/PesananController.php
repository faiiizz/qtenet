<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use PDF;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function success()
    {
        return view('layout.success');
    }

    public function showInputKodeMeja()
    {
        return view('layout.komej');
    }

    public function inputKodeMeja(Request $request)
    {
        $data = $request->validate([
            'kode_meja' => 'required',
            'nama_pemesan' => 'required',
        ]);

        $simpan = new Pesanan();
        $simpan->kode_meja = request()->input('kode_meja');
        $simpan->nama_pemesan = request()->input('nama_pemesan');
        $simpan->save();
        return redirect('/menufe/' . $simpan->id)->with('kode_meja', $data['kode_meja']);
    }

    public function checkout($id)
    {
        // Mengambil pesanan berdasarkan id
        $pesanan = Pesanan::find($id);

        // Mengambil item keranjang berdasarkan id pesanan
        $cartItems = Cart::select('menu_id', DB::raw('SUM(jumlah) as total_jumlah'))
            ->where('pesanan_id', $id)
            ->groupBy('menu_id')
            ->get();

        // Menghitung total pemasukan dari pesanan
        $totalPemasukan = $pesanan->jumlah_harga;

        return view('layout.checkout', compact('pesanan', 'cartItems', 'totalPemasukan'));
    }



    public function dapes()
    {
        return view(
            'dapes.index',
            [
                'pesanans' => Pesanan::paginate(6)
            ]
        );
    }

    public function edit(Pesanan $pesan,$id)
    {
        // dd($id);
        $pesanan = Pesanan::findOrFail($id);
        return view('dapes.edit', [
            'pesanans' => $pesanan
        ]);

    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $pesanan->update([
            'status' => $request->input('status')
        ]);

        // dd($pesanan);

        return redirect('/dapes')->with('success', 'Data berhasil di Update');
    }

    public function pendapatan()
    {
        return view(
            'pendapatan.index',
            [
                'pesanans' => Pesanan::paginate(6)
            ]
        );
    }

    public function pendapatanpdf()
    {
        return view(
            'pendapatan.pendapatan-pdf',
            [
                'pesanans' => Pesanan::paginate(6)
            ]
        );
    }



    /**
     * Update the specified resource in storage.
     */





}
