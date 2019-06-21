<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus\IngredientesPlato;
use App\SuperAdmin\IngredientesSugerido;
use App\Menus\PlatosCarta;

class IngredientesPlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function buscarIngrediente($nombre){
        $nombres = IngredientesSugerido::nombre($nombre)->take(10)->get("nombre");
        return $nombres;
    }
    
    public function getListadoPlato($idPlato)
    {
        $plato = PlatosCarta::find((int)$idPlato);
        
        $ingredientes = $plato->ingredientes;
        return response()->json($ingredientes);
    }
    
    public function ingredienteSugeridos($q)
    {
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurante $restaurante)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->validate([
            'idPlato'   =>  'integer|required',
            'nombre'    =>  'string|required'
        ]);
        
        
        IngredientesPlato::create([
            'platosCarta_id' =>  $data["idPlato"],
            'nombre'         =>  $data["nombre"]      
        ]);
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'    =>  'string|required'
        ]);
        
        
        IngredientesPlato::find($id)->update([
            'nombre'         =>  $data["nombre"]      
        ]);
        
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IngredientesPlato::find($id)->delete();
        
        return;
    }
}
