<?php

namespace App\Menus;

use Illuminate\Database\Eloquent\Model;

class PlatosDelDia extends Model
{
    protected $guarded=[];
    
    public function restaurante(){
        return $this->belongsTo(\App\Restaurantes\Restaurante::class);
    }
    
    public function platoCarta(){
        return $this->belongsTo(\App\Menus\PlatosCarta::class,'');
    }
    
    public function scopeNombre($query, $string){
        return $query->where('nombre','LIKE',"%$string%");
    }
    
    public function scopeDescripcion($query, $string){
        return $query->where('descripcion','LIKE',"%$string%");
    }
    
    public function scopeFechaActual($query,$fecha){
        return $query->where('fecha','=',"$fecha");
    }
            
}
