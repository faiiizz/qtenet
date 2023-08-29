<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'pesanan_id',
        'jumlah',
        'jumlah_harga',
    ];


    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }
}
