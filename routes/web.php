<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['cekLogin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('welcome');
    });

    // Route::get('/catatan', 'App\Http\Controllers\CatatanController@index');
    // Route::get('/catatan/create', 'App\Http\Controllers\CatatanController@create');
    // Route::post('/catatan', 'App\Http\Controllers\CatatanController@store');
    // Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@show');
    // Route::get('/catatan/{catatan}/edit', 'App\Http\Controllers\CatatanController@edit');
    // Route::put('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@update');
    // Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@destroy');
    // Route::get('/cetakcatat', 'App\Http\Controllers\CatatanController@cetakcatat');

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('/listuser', 'App\Http\Controllers\UserController@index');
    Route::get('/listuser/create', 'App\Http\Controllers\UserController@create');
    Route::post('/listuser', 'App\Http\Controllers\UserController@store');
    Route::get('/listuser/{listuser}', 'App\Http\Controllers\UserController@show');
    Route::get('/listuser/{listuser}/edit', 'App\Http\Controllers\UserController@edit');
    Route::put('/listuser/{listuser}', 'App\Http\Controllers\UserController@update');
    Route::get('/listuser/{listuser}', 'App\Http\Controllers\UserController@destroy');
    // Route::get('/cetakcatat', 'App\Http\Controllers\UserController@cetakcatat');


    // Route::get('/inventory', 'App\Http\Controllers\InventoryController@index');
    // Route::get('/inventory/create', 'App\Http\Controllers\InventoryController@create');
    // Route::post('/inventory', 'App\Http\Controllers\InventoryController@store');
    // Route::get('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@show');
    // Route::get('/inventory/{inventory}/edit', 'App\Http\Controllers\InventoryController@edit');
    // Route::put('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@update');
    // Route::get('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@destroy');
    // Route::get('/cetakinv', 'App\Http\Controllers\InventoryController@cetakinv');



    Route::get('/pendapatan', 'App\Http\Controllers\PesananController@pendapatan');
    Route::get('/pendapatan-pdf', 'App\Http\Controllers\PesananController@pendapatanpdf');

    Route::get('/dapes', 'App\Http\Controllers\PesananController@dapes');
    Route::get('/dapes/{dapes}/edit', 'App\Http\Controllers\PesananController@edit');
    Route::put('/dapes/{dapes}', 'App\Http\Controllers\PesananController@update');


    // Route::get('/pengambilan', 'App\Http\Controllers\PengambilanController@index');
    // Route::get('/pengambilan/create', 'App\Http\Controllers\PengambilanController@create');
    // Route::post('/pengambilan', 'App\Http\Controllers\PengambilanController@store');
    // Route::get('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@show');
    // Route::get('/pengambilan/{pengambilan}/edit', 'App\Http\Controllers\PengambilanController@edit');
    // Route::put('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@update');
    // Route::get('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@destroy');
    // Route::get('/cetakambil', 'App\Http\Controllers\PengambilanController@cetakambil');

    // Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
    // Route::get('/pengeluaran/create', 'App\Http\Controllers\PengeluaranController@create');
    // Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');
    // Route::get('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@show');
    // Route::get('/pengeluaran/{pengeluaran}/edit', 'App\Http\Controllers\PengeluaranController@edit');
    // Route::put('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@update');
    // Route::get('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@destroy');
    // Route::get('/cetakluar', 'App\Http\Controllers\PengeluaranController@cetakluar');

    Route::get('/menu', 'App\Http\Controllers\MenuController@index');
    Route::get('/menu/create', 'App\Http\Controllers\MenuController@create');
    Route::post('/menu', 'App\Http\Controllers\MenuController@store');
    Route::get('/menu/{menu}', 'App\Http\Controllers\MenuController@show');
    Route::get('/menu/{menu}/edit', 'App\Http\Controllers\MenuController@edit');
    Route::put('/menu/{menu}', 'App\Http\Controllers\MenuController@update');
    Route::get('/menu/{menu}', 'App\Http\Controllers\MenuController@destroy');

    // Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
});

Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/loginProses', 'App\Http\Controllers\LoginController@loginProses');
// Route::post('/verify', 'ForgotPasswordController@verifyOtp');
// Route::post('/resend', 'ForgotPasswordController@resendOtp');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
// Route::post('/forgot', 'ForgotPasswordController@forgot');
// Route::get('/verifyOtp/{id}', 'ForgotPasswordController@verifyOtp');
// Route::post('/resendOtp', 'ForgotPasswordController@resendOtp');
// Route::post('reset/{id}', 'ForgotPasswordController@reset');

Route::get('/registrasi', 'App\Http\Controllers\LoginController@registrasi');
Route::post('/registrasiProses', 'App\Http\Controllers\LoginController@registrasiProses');


Route::get('/menufe/{id}', 'App\Http\Controllers\MenuController@menufe')->name('layout.menuh');

Route::get('/cart/{id}', 'App\Http\Controllers\CartController@cart')->name('cart');
// Rute untuk menambahkan item ke keranjang
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

// Rute untuk menghapus item dari keranjang
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove');

// Rute untuk mengubah jumlah item dalam keranjang
Route::patch('/cart/{id}', 'App\Http\Controllers\CartController@updateCart');

// Rute untuk proses pemesanan
Route::get('/checkout/{id}', 'App\Http\Controllers\PesananController@checkout')->name('checkout');

// Route::get('/addToCart/{id}', 'App\Http\Controllers\MenuController@addToCart')->name('add_to_cart');
// Route::get('/pesanan', 'App\Http\Controllers\MenuController@cart')->name('cart');
// Route::patch('/update-cart', 'App\Http\Controllers\MenuController@updatePesanan')->name('update_cart');
// Route::delete('/remove-from-cart', 'App\Http\Controllers\MenuController@hapusPesanan')->name('remove_from_cart');

// Route::get('/pemesan', 'App\Http\Controllers\PemesanController@create');

Route::get('/kodemejacreate', 'App\Http\Controllers\PesananController@showInputKodeMeja')->name('input_kode_meja');
Route::post('/kodemeja', 'App\Http\Controllers\PesananController@InputKodeMeja')->name('input_kode_meja_procces');

Route::get('/menufe/{menu}', 'App\Http\Controllers\MenuController@show');

// Route::post('/login', [LoginController::class,'authenticate']);
