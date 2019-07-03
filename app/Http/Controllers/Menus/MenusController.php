<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus\PlatosDelDia;
use App\Menus\PlatosCarta;
use App\Http\Controllers\helpers;

class MenusController extends Controller
{
    public function index($tipo){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $listado= [];
        
        $platosDia = PlatosDelDia::where("tipo_plato",$tipo)->fechaActual($fechaActual)->take(10)->get();
        $platosCarta = PlatosCarta::where([
            'disponibilidad'    =>  'Si',
            'tipo_plato'        =>  $tipo
        ])->take(10)->get();
        
        return response()->json([
            "delDia"    =>  $platosDia,
            "carta"     =>  $platosCarta
        ]);
    }
}
