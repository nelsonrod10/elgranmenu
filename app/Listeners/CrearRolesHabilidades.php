<?php

namespace App\Listeners;

use App\Events\RolesHabilidades;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Bouncer;
class CrearRolesHabilidades
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RolesHabilidades  $event
     * @return void
     */
    public function handle(RolesHabilidades $event)
    {
        //Bouncer::allow('desarrollador')->to(['crear-empresa','configurar-empresa','crear-asesor','crear-usuarios-administrador','crear-usuarios-digitador','administrar-comunidad']);
        Bouncer::allow('super-admin')->to('crear-restaurante');
        Bouncer::allow('desarrollador')->to('crear-restaurante');
        Bouncer::allow('administrador-restaurante')->to(['crear-menu-dia','crear-carta','crear-perfil']);
        Bouncer::allow('cliente-restaurante')->to(['crear-dieta','crear-perfil']);
        Bouncer::assign('super-admin')->to(1);
    }
}

