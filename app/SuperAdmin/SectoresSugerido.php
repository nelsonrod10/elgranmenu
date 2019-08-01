<?php

namespace App\SuperAdmin;

use Illuminate\Database\Eloquent\Model;

class SectoresSugerido extends Model
{
    protected $guarded = [];
    
    public function restaurantes(){
        return $this->hasMany(\App\Restaurantes\Restaurante::class,'sector_id');
    }
}
