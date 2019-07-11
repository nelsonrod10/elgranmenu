<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuperAdmin\SectoresSugerido;

class SectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = SectoresSugerido::all();
        return view("superAdmin.sectores")->with(compact("sectores"));
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
            "nombre" =>  "required|string|unique:sectores_sugeridos,nombre",
            "direccion" =>  "required|string|unique:sectores_sugeridos,direccion",
            "ciudad" =>  "required|string"   
        ]);
        
        SectoresSugerido::create([
            "nombre"    =>  $data["nombre"],
            "direccion" =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
            "ciudad"    =>  $data["ciudad"],
        ]);
        
        return redirect()->back();
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
        $sector = SectoresSugerido::find($id);
        
        $data = $request->validate([
            "nombre" =>  "required|string|unique:sectores_sugeridos,nombre,".$sector->id,
            "direccion" =>  "required|string|unique:sectores_sugeridos,direccion,".$sector->id,
            "ciudad" =>  "required|string"  
        ]);
        
        $direccionEditada = str_replace(["No", " N ","#"], " ", $data["direccion"]);
        
        if($direccionEditada != $sector->direccion){
            $sector->update([
                'direccion'   =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
            ]);
        }
        
        $sector->update([
            "nombre"    =>  $data["nombre"],
            "ciudad"    =>  $data["ciudad"],
        ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SectoresSugerido::find($id)->delete();
        return redirect()->back();
    }
}
