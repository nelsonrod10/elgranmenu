<?php

namespace App\Restaurantes;

use Illuminate\Database\Eloquent\Model;

class HorariosAtencion extends Model
{
    protected $guarded=[];
    
    public function restaurante(){
        return $this->belongsTo(\App\Restaurantes\Restaurante::class);
    }
}
