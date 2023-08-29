<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Pesanan;

class LayoutController extends Controller
{
    public function show($pesanan_id)
    {
        $pesanan = Pesanan::findOrFail($pesanan_id);
        $keranjang = Cart::where('pesanan_id', $pesanan_id)->get();

        return view('keranjang.show', compact('pesanan', 'cart'));
    }
}
