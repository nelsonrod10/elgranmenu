<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatosDelDia extends Model
{
    protected $guarded=[];
    
    public function restaurante(){
        return $this->belongsTo(\App\Restaurantes::class);
    }
}
