<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'pesanan_id',
    ];

    public function pemesan()
    {
        return $this->belongsTo(
            Pemesan::class, 'pemesan_id', 'id'
        );
    }

    public function menu()
    {
        return $this->belongsTo(
            Menu::class, 'menu_id', 'id'
        );
    }
}
