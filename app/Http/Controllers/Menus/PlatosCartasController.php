<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\helpers;
use App\Menus\PlatosCarta;
use App\Menus\PlatosDelDia;
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
    
    public function seleccionDelDia($idPlatoCarta)
    {
        date_default_timezone_set('America/Bogota');
        $objFechaActual = helpers::getDateNow();
        $fechaActual = $objFechaActual->format("Y-m-d");
        $response = 0;
        
        $plato = PlatosCarta::find($idPlatoCarta);
        $platoDelDia = $plato->platosDelDia()->where('fecha',(string)$fechaActual)->get();
        
        if($platoDelDia->count() > 0)
            $response = 202;    
        else
            $response = 404;
        
        return response()->json ($response);
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
        $data = $request->validate([
            'nombre'        =>  'string|required',
            'tipoMenu'      =>  'string|in:corriente,especial|required',
            'precio'        =>  'string|required',
            'tipoPlato'     =>  'string|in:tradicional,vegetariano,vegano|required',
            'descripcion'   =>  'string|required'
        ]);
        
        $plato = PlatosCarta::find($id);
        $plato->update([
            'nombre'             =>  $data['nombre'],
            'descripcion'        =>  $data['descripcion'],
            'tipo_menu'          =>  $data['tipoMenu'],
            'tipo_plato'         =>  $data['tipoPlato'],
            'precio'             =>  $data['precio'],
        ]);
        
        if($plato->platosDelDia->count() > 0){
            $this->actualizarPlatosDelDia($plato->platosDelDia, $data);
        }
        
        return;
    }
    
    private function actualizarPlatosDelDia($platosDelDia, $data){
        foreach ($platosDelDia as $platoDia) {
            $platoDia->update([
                'nombre'             =>  $data['nombre'],
                'descripcion'        =>  $data['descripcion'],
                'tipo_plato'         =>  $data['tipoPlato'],
                'precio'             =>  $data['precio'],
            ]);
        }
        
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
        PlatosCarta::find($id)->delete();
        return;
    }
}
