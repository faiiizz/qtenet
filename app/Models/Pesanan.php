<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_meja',
        'nama_pemesan',
        'jumlah_harga',
        'status',
    ];

    public function cart() {
        return $this->hasMany(Cart::class);
    }
}
