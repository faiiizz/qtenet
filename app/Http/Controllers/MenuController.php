<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'menu.index',
            [
                'menus' => Menu::paginate(6)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'nama_menu' => 'required',
                'gmbr_menu' => 'required|image|mimes:jpeg,png,jpg|max:5048',
                'deskripsi' => 'required',
                'status' => 'required',
                'harga' => 'required',
            ], [

                'nama_menu.required' => 'Nama Barang Harus Diisi',
                'gmbr_menu.required' => 'Gambar Barang Harus Diisi',
                'deskripsi.required' => 'Deskripsi Barang Harus Diisi',
                'status.required' => 'Status Harus Diisi',
                'harga_brg.numeric' => 'Harga Barang Harus Angka',
                'gmbr_menu.image' => 'Foto Barang Harus Gambar',
                'gmbr_menu.mimes' => 'Foto Barang Harus Berformat jpeg,png,jpg,gif,svg',
                'gmbr_menu.max' => 'Foto Barang Maksimal 5MB',

            ]);

            $foto_file = $request->file('gmbr_menu');
            $foto_ekstensi = $foto_file->getClientOriginalExtension();
            $nama_foto = time() . '.' . $foto_ekstensi;
            $foto_file->move(public_path('images'), $nama_foto);

            $data = [
                'nama_menu' => $request->nama_menu,
                'gmbr_menu' => $nama_foto,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'harga' => $request->harga,
            ];



            Menu::create($data);
            return redirect('/menu')->with('success', 'Menu Sukses ditambahkan');
        }



    }

    public function cart()
    {
        return view('layout.pesanan');
    }

    public function menufe($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $menus = Menu::all();
        return view('layout.menuh', compact('menus','pesanan'));
    }


    public function addToCart($id)
    {
        $menu = Menu::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['jumlah']++;
        }else {
            $cart[$id]= [
                "gmbr_menu" => $menu->gmbr_menu,
                "nama_menu" => $menu->nama_menu,
                "deskripsi" => $menu->deskripsi,
                "harga" => $menu->harga,
                "jumlah" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Pesanan successful add to cart');

    }
    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menus = $menu;
        return view('layout.detail')->with('menu', $menus);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'menus' => $menu::find($menu->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'nama_menu' => '',
            'gmbr_menu' => '',
            'deskripsi' => 'required',
            'status' => 'required',
            'harga' => 'required',
        ]);

        Menu::where('id', $menu->id)->update($validatedData);
        return redirect('/menu')->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('/menu');
    }
}

