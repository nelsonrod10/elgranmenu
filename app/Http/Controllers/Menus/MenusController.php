<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurantes\Restaurante;
use App\Menus\PlatosDelDia;
use App\Menus\PlatosCarta;
use App\Http\Controllers\helpers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MenusController extends Controller
{
    public function index($tipo){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $listadoMenus= [];
        
        $platosDia = PlatosDelDia::where("tipo_plato",$tipo)->fechaActual($fechaActual)->take(10)->get();
        $platosCarta = PlatosCarta::where([
            'disponibilidad'    =>  'Si',
            'tipo_plato'        =>  $tipo
        ])->take(10)->get();
        
        foreach ($platosDia as $plato) {
            $restaurante = Restaurante::find($plato->restaurante_id);
            
            array_push($listadoMenus, [
                "restaurante" => $restaurante,
                "plato"       => $plato         
            ]);
        }
        
        foreach ($platosCarta as $platoCarta) {
            $restaurante = Restaurante::find($platoCarta->restaurante_id);
            
            $exitePlatoDelDia = PlatosDelDia::where([
                'restaurante_id'    =>  $restaurante->id,    
                'platosCarta_id'    =>  $platoCarta->id
            ])->first();
            
            if(!$exitePlatoDelDia){
                array_push($listadoMenus, [
                    "restaurante" => $restaurante,
                    "plato"       => $platoCarta
                ]);
            }
            
        }
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($listadoMenus);
        $perPage = 1;
        $currentPageSearchResults = $col->all();
        //$currentPageSearchResults = $col->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $test = array_slice($currentPageSearchResults, ($currentPage * $perPage) - $perPage, $perPage);
        //$entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        //$entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage);
        $paginatedItems= new LengthAwarePaginator($test , count($col), $perPage,$currentPage);
        return response()->json($paginatedItems);
    }
}
