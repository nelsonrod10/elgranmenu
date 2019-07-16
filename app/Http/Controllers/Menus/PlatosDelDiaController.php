<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menus\PlatosDelDia;
use App\Menus\PlatosCarta;
use App\Restaurantes\Restaurante;
use App\Http\Controllers\helpers;
use App\SuperAdmin\SectoresSugerido;

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
        
        $platosDia = PlatosDelDia::nombre($q)->orWhere->descripcion($q)->fechaActual($fechaActual)->take(10)->get([
           'restaurante_id','platosCarta_id','nombre' 
        ]);
        
        $platosCarta = PlatosCarta::nombre($q)->orWhere->descripcion($q)->where('disponibilidad','Si')->take(10)->get([
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
        
        $platosDia = PlatosDelDia::nombre($platoSeleccionado)->orWhere->descripcion($platoSeleccionado)->fechaActual($fechaActual)->take(10)->get();
        $platosCarta = PlatosCarta::nombre($platoSeleccionado)->orWhere->descripcion($platoSeleccionado)->where('disponibilidad','Si')->take(10)->get();
        
        foreach ($platosDia as $plato) {
            $restaurante = Restaurante::find($plato->restaurante_id);
            
            array_push($restaurantes, [
                "restaurante" => $restaurante,
                "plato"       => $plato         
            ]);
        }
        
        foreach ($platosCarta as $platoCarta) {
            $restaurante = Restaurante::find($platoCarta->restaurante_id);
            
            $exitePlatoDelDia = PlatosDelDia::where([
                'restaurante_id'    =>  $platoCarta->restaurante->id,    
                'platosCarta_id'    =>  $platoCarta->id
            ])->first();
            
            if(!$exitePlatoDelDia){
                array_push($restaurantes, [
                    "restaurante" => $restaurante,
                    "plato"       => $platoCarta         
                ]);
            }
            
        }
        
        return response()->json($restaurantes);
    }
    
    public function buscarOtrosRestaurantes($idSector){
        $restaurantes= Restaurante::where('sector_id',(string)$idSector)->get();
        $sector = SectoresSugerido::find($idSector);
        return response()->json([
            "restaurantes"  =>  $restaurantes,
            "sector"        =>  $sector
        ]);
    }
    
    public function otrosPlatos($restaurante, $platoActual){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $platos = PlatosDelDia::where('restaurante_id',$restaurante)->whereNotIn('id',[$platoActual])->fechaActual($fechaActual)->take(10)->get();
        
        return response()->json($platos);
    }
    
    public function menuRestaurantes($idRestaurante){
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        $restaurante= Restaurante::find($idRestaurante);
        $sector = SectoresSugerido::find($restaurante->sector_id);
        
        $delDia = PlatosDelDia::where('restaurante_id',$idRestaurante)->fechaActual($fechaActual)->get();
        $carta = PlatosCarta::where([
            'restaurante_id'=> $idRestaurante,
            'disponibilidad'=> 'Si',
            ])->get();
        
        return response()->json([
            "delDia"    =>  $delDia,
            "carta"     =>  $carta,
            "sector"    =>  $sector
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
        $exitePlatoDelDia = PlatosDelDia::where([
            'restaurante_id'    =>  $platoCarta->restaurante->id,    
            'platosCarta_id'    =>  $platoCarta->id
        ])->first();
        
        if(!$exitePlatoDelDia){
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
        
        $this->update($request, $exitePlatoDelDia->id);
        
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
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
    
        PlatosDelDia::find($id)->update([
            'fecha'   =>  $fechaActual,
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
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        
        PlatosDelDia::where([
            'platosCarta_id' => $id,
            'fecha' =>(string)$fechaActual
        ])->update([
            'fecha' =>  '1900-01-01'
        ]);
        
        return ;
    }
}
