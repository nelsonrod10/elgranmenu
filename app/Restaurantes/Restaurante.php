<?php

namespace App\Restaurantes;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $guarded=[];
    
    public function administrador(){
       return $this->hasOne(App\User::class,'administrador_id');
    }
    
    public function socialmedia(){
       return $this->hasMany(App\Restaurantes\RedesSociale::class);
    }
}
