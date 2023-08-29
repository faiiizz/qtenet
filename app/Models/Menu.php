<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'gmbr_menu',
        'deskripsi',
        'status',
        'harga',
    ];

    public function pemesan()
{
    return $this->belongsToMany(Pemesan::class)->withPivot('jumlah');
}

    public function pesanan()
{
    return $this->hasMany(Pesanan::class);
}


}
