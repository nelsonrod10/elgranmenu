<?php

namespace App\Menus;

use Illuminate\Database\Eloquent\Model;

class IngredientesPlato extends Model
{
    protected $guarded=[];
    
    public function plato(){
        return $this->belongsTo(\App\Menus\PlatosCarta::class);
    }
    
    public function scopeNombre($query, $q){
        return $query->where('nombre',$q);
    }
}
