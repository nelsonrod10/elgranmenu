<?php

namespace App\Restaurantes;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $guarded=[];
    
    public function administrador(){
       return $this->hasOne(\App\User::class,'administrador_id');
    }
    
    public function socialmedia(){
       return $this->hasMany(\App\Restaurantes\RedesSociale::class);
    }
    
    public function horarioAtencion(){
        return $this->hasMany(\App\Restaurantes\HorariosAtencion::class);
    }
    
    public function platosCarta(){
        return $this->hasMany(\App\Menus\PlatosCarta::class);
    }
    
    public function platosDelDia(){
        return $this->hasMany(\App\Menus\PlatosDelDia::class);
    }
    
    public function sector(){
        return $this->hasOne(\App\SuperAdmin\SectoresSugerido::class,'id','sector_id');
    }
}
