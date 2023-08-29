<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($id)
    {
        $data = Menu::find($id);
        $pesanan = Pesanan::all();

        foreach ($pesanan as $pesanan_item) {
            $id_pesanan = $pesanan_item->id;
            // Lakukan apa pun yang Anda ingin lakukan dengan $id_pesanan
        }


        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan not found');
        }
        // Logic untuk menambahkan menu ke keranjang
        $cartItem = new Cart();
        $cartItem->menu_id = $data->id;
        $cartItem->pesanan_id = $id_pesanan;
        $cartItem->jumlah = 1; // Misalnya, default jumlah adalah 1
        $cartItem->save();

        return redirect()->back()->with('success', 'Pesanan successful add to cart');
    }

    public function Cart($id)
{
    $pesanan = Pesanan::find($id);
    $cartItems = Cart::with('menu')
        ->select('menu_id', DB::raw('SUM(jumlah) as total_jumlah')) // Gunakan SUM untuk jumlah
        ->where('pesanan_id', $id)
        ->groupBy('menu_id')
        ->get();

    $totalPrice = 0;

    // Hitung total harga dari item keranjang
    foreach ($cartItems as $cartItem) {
        $totalPrice += $cartItem->menu->harga * $cartItem->total_jumlah;
    }

    // Simpan total harga ke dalam model Pesanan
    $pesanan->jumlah_harga = $totalPrice;
    $pesanan->save();

    return view('layout.pesanan', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'pesanan' => $pesanan]);
}


    public function remove($id)
    {
        // Logic untuk menghapus menu dari keranjang
        $cartItem = Cart::where('menu_id', $id)->first(); // Menggunakan first() untuk mengambil satu item
        if ($cartItem) {
            $cartItem->delete(); // Menghapus item jika ditemukan
            return redirect()->back()->with('success', 'Pesanan Sudah dihapus');
        } else {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }
    }
}
