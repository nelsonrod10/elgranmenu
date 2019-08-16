<?php

namespace App\Listeners;

use App\Events\RestauranteRegistrado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestauranteRegistradoAdmin;

class NotificarAdministradorRestaurante
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
     * @param  RestauranteRegistrado  $event
     * @return void
     */
    public function handle(RestauranteRegistrado $event)
    {
        Mail::to($event->datos->email)->send(new RestauranteRegistradoAdmin($event));
        //return new RestauranteRegistradoAdmin($event);
    }
}
