<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_atribut extends Model
{
    use HasFactory;

    public static function isStokAvailable($menu_id){
        $getMenuStok = Menu_atribut::select('stok')->where(['$menu_id'=>$menu_id])->first();
        return $getMenuStok->stok;
    }
}
