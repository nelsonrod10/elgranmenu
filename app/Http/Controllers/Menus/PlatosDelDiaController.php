<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlatosDelDia;



class PlatosDelDiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($q)
    {
        $platos = PlatosDelDia::all();
        $platosEncontrados = [];
        $count = 0;
        foreach ($platos as $plato){
            if (stristr(substr($plato->nombre, 0, strlen($q)),$q)) { // || stristr(substr($plato->nombre, 0, strlen($q)),$q) || stristr(substr($empleado->apellidos, 0, strlen($q)),$q)
                if($count <=9){
                    array_push($platosEncontrados, $plato);
                }
                $count++;
            }
        }
        if(count($platosEncontrados) === 0){
            array_push($platosEncontrados, ["nombre" => "Lo sentimos, no se encontró nada"]);
        }
        return response()->json($platosEncontrados);
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
