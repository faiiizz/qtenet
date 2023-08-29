<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesanan_id',
        'total',
    ];

    // Hubungan dengan model Order
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
