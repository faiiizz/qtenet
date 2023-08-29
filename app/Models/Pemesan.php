<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pemesan',
        'kode_meja',
    ];

    public function items()
{
    return $this->belongsToMany(Menu::class)->withPivot('jumlah');
}

}
