<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatosCarta extends Model
{
    protected $guarded=[];
    
    public function restaurante(){
        return $this->belongsTo(App\Restaurantes::class);
    }
}
