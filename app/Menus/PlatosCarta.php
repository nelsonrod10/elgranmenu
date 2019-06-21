<?php

namespace App\Menus;

use Illuminate\Database\Eloquent\Model;

class PlatosCarta extends Model
{
    protected $guarded=[];
    
    public function restaurante(){
        return $this->belongsTo(\App\Restaurantes\Restaurante::class);
    }
    
    public function platosDelDia(){
        return $this->hasMany(\App\Menus\PlatosDelDia::class,'platosCarta_id');
    }
    
    public function ingredientes(){
        return $this->hasMany(\App\Menus\IngredientesPlato::class,'platosCarta_id');
    }
}
