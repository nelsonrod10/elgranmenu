<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlatosCarta;
use App\Restaurantes\Restaurante;

class PlatosCartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idRestaurante)
    {
        $restaurante = Restaurante::find($idRestaurante);
        $carta = $restaurante->platosCarta;
        
        return view('restaurantes.administrador.menus.index')->with(['restaurante'=>$restaurante,'carta' => $carta]);
    }
    
    public function getPlatos($idRestaurante)
    {
        $restaurante = Restaurante::find($idRestaurante);
        $carta = $restaurante->platosCarta;
        
        return response()->json($carta);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurante $restaurante)
    {
        return view('restaurantes.administrador.menus.create')->with(['restaurante'=>$restaurante]);
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
            'restaurante'   =>  'integer|required',
            'nombre'        =>  'string|required',
            'tipoMenu'      =>  'string|in:corriente,especial|required',
            'precio'        =>  'string|required',
            'tipoPlato'     =>  'string|in:tradicional,vegetariano,vegano|required',
            'descripcion'   =>  'string|required'
        ]);
        
        PlatosCarta::create([
            'restaurante_id'     =>  $data['restaurante'],
            'nombre'             =>  $data['nombre'],
            'descripcion'        =>  $data['descripcion'],
            'tipo_menu'          =>  $data['tipoMenu'],
            'tipo_plato'         =>  $data['tipoPlato'],
            'precio'             =>  $data['precio'],
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
