<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Events\RolesHabilidades;
use Illuminate\Http\Request;
//use Bouncer;
//use App\User;

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
            return view('restaurantes.administrador.restaurantes')->with(['user'=>$user,'restaurantes'=>$user->restaurantes]);
        }
        
        return redirect('/inicio');
    }
    
    public function crearRoles(){
        event(new RolesHabilidades());
        return;
    }
    
    /*public function crearUsuarioAdministrador(){
        $user = User::where('email','nelsonrod10@gmail.com')->get();
        
        if($user->count() === 0){
            $newUser = User::firstOrCreate([
                'name' => "Nelson Rodríguez ",
                'email' => "nelsonrod10@gmail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('admin'), // password
                //'remember_token' => Str::random(10),

            ]);
            Bouncer::assign('super-admin')->to($newUser);    
        }
    
        return view('inicio');    
    }*/
}
