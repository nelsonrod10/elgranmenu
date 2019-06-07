<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleVerifyController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->isA('super-admin')){
            return view('super-admin.home');
        }
        if($user->isAn('administrador-restaurante')){
            //return redirect()->route('gestion-asesores.index');
            return view('restaurantes.administrador.home');
        }
        
        return redirect('/inicio');
    }
}
