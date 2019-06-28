<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus\PlatosDelDia;
use App\Menus\PlatosCarta;
use App\Restaurantes\Restaurante;
use App\Http\Controllers\helpers;

class PlatosDelDiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($q)
    {
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $platosDia = PlatosDelDia::nombre($q)->descripcion($q)->fechaActual($fechaActual)->take(10)->get([
           'restaurante_id','platosCarta_id','nombre' 
        ]);
        
        $platosCarta = PlatosCarta::nombre($q)->descripcion($q)->where('disponibilidad','Si')->take(10)->get([
           'restaurante_id','id','nombre' 
        ]); 
        
        return response()->json([
            'platosCarta'   =>  $platosCarta,
            'platosDia'     =>  $platosDia,
        ]);
    }
    
    public function buscarRestaurantes($platoSeleccionado){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $restaurantes= [];
        
        $platosDia = PlatosDelDia::nombre($platoSeleccionado)->fechaActual($fechaActual)->take(10)->get();
        $platosCarta = PlatosCarta::nombre($platoSeleccionado)->where('disponibilidad','Si')->take(10)->get();
        
        foreach ($platosDia as $plato) {
            $restaurante = Restaurante::find($plato->restaurante_id);
            
            $platoRestaurante = PlatosDelDia::nombre($platoSeleccionado)->fechaActual($fechaActual)->where([
                'restaurante_id'   =>  $restaurante->id   
            ])->first();
            
            array_push($restaurantes, [
                "restaurante" => $restaurante,
                "plato"       => $platoRestaurante         
            ]);
        }
        
        foreach ($platosCarta as $platoCarta) {
            $restaurante = Restaurante::find($platoCarta->restaurante_id);
            
            $platoRestaurante = PlatosCarta::nombre($platoSeleccionado)->where([
                'restaurante_id'   =>  $restaurante->id,
                'disponibilidad'   =>  'Si'
            ])->first();
            
            array_push($restaurantes, [
                "restaurante" => $restaurante,
                "plato"       => $platoRestaurante         
            ]);
        }
        
        
        return response()->json($restaurantes);
    }   
    
    public function otrosPlatos($restaurante, $platoActual){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $platos = PlatosDelDia::where('restaurante_id',$restaurante)->whereNotIn('id',[$platoActual])->fechaActual($fechaActual)->take(10)->get();
        
        return response()->json($platos);
    }
    
    public function menuRestaurantes($restaurante){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $delDia = PlatosDelDia::where('restaurante_id',$restaurante)->fechaActual($fechaActual)->get();
        $carta = PlatosCarta::where([
            'restaurante_id'=> $restaurante,
            'disponibilidad'=> 'Si',
            ])->get();
        
        return response()->json([
            "delDia"    =>  $delDia,
            "carta"     =>  $carta     
        ]);
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
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
    
        $data = $request->validate([
            'idPlato'            =>  'integer|required',
        ]);
        
        
        $platoCarta = PlatosCarta::find($data["idPlato"]);
        
        PlatosDelDia::create([
            'restaurante_id'    =>  $platoCarta->restaurante->id,
            'platosCarta_id'    =>  $platoCarta->id,
            'fecha'             =>  $fechaActual,
            'nombre'            =>  $platoCarta->nombre,
            'descripcion'       =>  $platoCarta->descripcion,
            'tipo_plato'        =>  $platoCarta->tipo_plato,
            'precio'            =>  $platoCarta->precio
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
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        PlatosDelDia::where([
            'platosCarta_id' => $id,
            'fecha' =>(string)$fechaActual
        ])->delete();
        
        return ;
    }
}
