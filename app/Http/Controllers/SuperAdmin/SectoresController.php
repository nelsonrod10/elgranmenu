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
        return view("superAdmin.sectores");
    }
    
    public function listadoSectores(){
        $sectores = SectoresSugerido::all();
        return response()->json($sectores);
    }
    
    public function sectoresPorCiudad($ciudad){
        $sectores = SectoresSugerido::where("ciudad",$ciudad)->get();
        return response()->json($sectores);
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
            "nombre"    =>  "required|string|unique:sectores_sugeridos,nombre",
            "ciudad"    =>  "required|string",
            "tipo"      =>  "required|string",
            "limite1"   =>  "string|nullable",       
            "limite2"   =>  "string|nullable",
            "limite3"   =>  "string|nullable",
            "limite4"   =>  "string|nullable",
            "direccion" =>  "string|nullable|unique:sectores_sugeridos,direccion",//
            
        ]);
        
        $sector = SectoresSugerido::create([
            "nombre"    =>  $data["nombre"],
            "tipo"      =>  $data["tipo"],
            "ciudad"    =>  $data["ciudad"],
        ]);
        
        if((string)$sector->tipo === "Zona o Sector"){
            $sector->update([
                "limite_1"   =>  $data["limite1"], 
                "limite_2"   =>  $data["limite2"], 
                "limite_3"   =>  $data["limite3"], 
                "limite_4"   =>  $data["limite4"], 
            ]);
        }
        
        if((string)$sector->tipo !== "Zona o Sector"){
            $sector->update([
                "direccion" =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
            ]);
        }
        
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
            "nombre"    =>  "required|string|unique:sectores_sugeridos,nombre,".$sector->id,
            "ciudad"    =>  "required|string",
            "tipo"      =>  "required|string",
            "limite1"   =>  "string|nullable",       
            "limite2"   =>  "string|nullable",
            "limite3"   =>  "string|nullable",
            "limite4"   =>  "string|nullable",
            "direccion" =>  "string|nullable|unique:sectores_sugeridos,direccion,".$sector->id,
        ]);
        
        $sector->update([
            "nombre"    =>  $data["nombre"],
            "tipo"      =>  $data["tipo"],    
            "ciudad"    =>  $data["ciudad"],
        ]);
        
        if((string)$sector->tipo === "Zona o Sector"){
            $sector->update([
                "limite_1"   =>  $data["limite1"], 
                "limite_2"   =>  $data["limite2"], 
                "limite_3"   =>  $data["limite3"], 
                "limite_4"   =>  $data["limite4"], 
                "direccion"  =>  null
            ]);
        }
        
        if((string)$sector->tipo !== "Zona o Sector"){
            $direccionEditada = str_replace(["No", " N ","#"], " ", $data["direccion"]);
            
            if($direccionEditada !== $sector->direccion){
                $sector->update([
                    "limite_1"  =>  null, 
                    "limite_2"  =>  null, 
                    "limite_3"  =>  null, 
                    "limite_4"  =>  null,    
                    'direccion' =>  str_replace(["No", " N ","#"], " ", $data["direccion"]),
                ]);    
            }
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
        SectoresSugerido::find($id)->delete();
        return;
    }
}
