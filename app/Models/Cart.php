<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [

        'menu_id',
        'pesanan_id',
        'jumlah'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
