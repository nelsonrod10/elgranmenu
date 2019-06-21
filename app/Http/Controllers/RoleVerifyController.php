<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Events\RolesHabilidades;
use Illuminate\Http\Request;

class RoleVerifyController extends Controller
{
    public function index(){
        $this->crearRoles();
        $user = Auth::user();
        if($user->isAn('super-admin')){
            return view('superAdmin.home');
        }
        if($user->isAn('administrador-restaurante')){
            //return redirect()->route('gestion-asesores.index');
            return view('restaurantes.administrador.home');
        }
        
        return redirect('/inicio');
    }
    
    public function crearRoles(){
        event(new RolesHabilidades());
        return;
    }
}
