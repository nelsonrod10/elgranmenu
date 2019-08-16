<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lanzamiento;
use App\Events\RestauranteRegistrado;

class LanzamientoController extends Controller
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
        $data = $request->validate([
            'restaurante'   =>  'required|string|unique:lanzamientos,restaurante',
            'direccion'     =>  'required|string|unique:lanzamientos,direccion',
            //'ciudad'      =>  'required|string',
            'contacto'      =>  'required|string',
            'email'         =>  'required|string|unique:lanzamientos,email',
            'telefono'      =>  'nullable|string',
            'comentarios'   =>  'nullable|string',
        ],[
            'required'      =>  'El campo :attribute es obligatorio',
            'string'       =>  'El campo :attribute debe ser una cadena de texto',
            'unique'        =>  'Lo sentimos ya exite un :attribute registrado con :input'
            
            
        ]);
        
        
        $datos = Lanzamiento::create([
            'restaurante'   =>  $data['restaurante'],
            'direccion'     =>  $data['direccion'],
            'ciudad'        =>  'Bogotá',//$data['ciudad'],
            'contacto'      =>  $data['contacto'],
            'email'         =>  $data['email'],
            'telefono'      =>  $data['telefono'],
            'comentarios'   =>  $data['comentarios'],
        ]);
        
        event(new RestauranteRegistrado($datos));
        
        return back()->with(['success-action'=>'inscrito']);
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
