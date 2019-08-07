<?php

namespace App\Http\Controllers\Restaurantes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurantes\Restaurante;
use App\SuperAdmin\SectoresSugerido;
use App\Http\Controllers\helpers;

class RestaurantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = auth()->user()->restaurantes;
        return view('restaurantes.administrador.restaurantes')->with(['restaurantes'=>$restaurantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('restaurantes.administrador.create');
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
            'nombre'        => 'string|required|unique:restaurantes,nombre',
            'nit'           => 'string|required|unique:restaurantes,nit',
            'direccion'     => 'string|required',
            'ciudad'        => 'string|required',
            'sector'        => 'integer|required|nullable',    
            'local'         => 'string|nullable',
            'telefono'      => 'integer|unique:restaurantes,telefono',
            'celular'       => 'integer|unique:restaurantes,celular',
            'tradicional'   => 'string|required',
            'vegetariano'   => 'string|required',
            'vegano'        => 'string|required',
        ]);
        
        $restaurante = Restaurante::create([
            'administrador_id'  =>  auth()->id(),
            'nombre'            =>  $data['nombre'],
            'nit'               =>  $data['nit'],
            'direccion'         =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
            'ciudad'            =>  $data['ciudad'],
            'sector_id'         =>  (string)$data['sector'],
            'local'             =>  ($data['local'])?$data['local']:null,
            'telefono'          =>  $data['telefono'],
            'celular'           =>  $data['celular'],
            'tradicional'       =>  $data['tradicional'],
            'vegetariano'       =>  $data['vegetariano'],
            'vegano'            =>  $data['vegano'],
        ]);
        
        return $restaurante->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurante = Restaurante::find($id);
        $sector = $restaurante->sector;
        return view('restaurantes.administrador.show')->with(compact('restaurante','sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurante = Restaurante::find($id);
        return view('restaurantes.administrador.update')->with(compact('restaurante'));
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
        $restaurante = Restaurante::find($id);
        
        $data = $request->validate([
            'nombre'        => 'string|required|unique:restaurantes,nombre,'.$restaurante->id,
            'direccion'     => 'string|required',
            'ciudad'        => 'string|required',
            'sector'        => 'integer|required|nullable',    
            'local'         => 'string|nullable',
            'telefono'      => 'integer|unique:restaurantes,telefono,'.$restaurante->id,
            'celular'       => 'integer|unique:restaurantes,celular,'.$restaurante->id,
            'tradicional'   => 'string|required',
            'vegetariano'   => 'string|required',
            'vegano'        => 'string|required',
        ]);
        
        $direccionEditada = str_replace(["No", " N ","#"], " ", $data["direccion"]);
        
        if($direccionEditada != $restaurante->direccion){
            $restaurante->update([
                'direccion'   =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
            ]);
        }
        
        $restaurante->update([
            'nombre'            =>  $data['nombre'],
            'ciudad'            =>  $data['ciudad'],
            'sector_id'         =>  (string)$data['sector'],
            'local'             =>  ($data['local'])?$data['local']:null,
            'telefono'          =>  $data['telefono'],
            'celular'           =>  $data['celular'],
            'tradicional'       =>  $data['tradicional'],
            'vegetariano'       =>  $data['vegetariano'],
            'vegano'            =>  $data['vegano'],
        ]);
        
        return response()->json($restaurante->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurante::find($id)->delete();
        
        return redirect()->route('gestion-restaurantes.index');
    }
}
