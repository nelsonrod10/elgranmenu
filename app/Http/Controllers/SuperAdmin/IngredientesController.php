<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuperAdmin\IngredientesSugerido;

class IngredientesController extends Controller
{
    public function crearListadoXML() {
        $archivo = simplexml_load_file(base_path("archivosXML/tabla_alimentos.xml"));
        $listado = $archivo->xpath("/alimentos/item");
        
        
        $ingredientes = IngredientesSugerido::all();
        
        foreach ($ingredientes as $ingrediente) {
            $ingrediente->delete();
        }
        
        foreach ($listado as $alimento) {
            IngredientesSugerido::create([
                'id'        =>  $alimento->id,
                'nombre'    =>  $alimento->nombre,
                'grupo'     =>  $alimento->grupo 
            ]);
        }
        
        return redirect()->back();
    }
}
