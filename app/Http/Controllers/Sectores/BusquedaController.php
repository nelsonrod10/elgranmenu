<?php

namespace App\Http\Controllers\Sectores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuperAdmin\SectoresSugerido;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = SectoresSugerido::all()->groupBy('ciudad');
        
        return response()->json($sectores);
    }
    
    public function listadoCiudades(){
        $archivo = simplexml_load_file(base_path("archivosXML/listado_ciudades.xml"));    
        $listadociudades = $archivo->xpath("/ciudades/item");
        
        return $listadociudades;
    }
    
    public function indexPorCiudad($ciudad){
        $index = SectoresSugerido::where('ciudad',$ciudad)->get();
        
        return response()->json($index);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = SectoresSugerido::find($id);
        $restaurantes = $sector->restaurantes;
        
        return response()->json([
            "sector"        =>  $sector,
            "restaurantes"  =>  $restaurantes
        ]);
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
