<?php

namespace App\SuperAdmin;

use Illuminate\Database\Eloquent\Model;

class IngredientesSugerido extends Model
{
    protected $guarded =[];
    
    public function scopeNombre($query, $nombre){
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
