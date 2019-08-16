<?php

namespace App\Listeners;

use App\Events\RestauranteRegistrado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestauranteRegistradoCEO;

class NotificarCEO
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
        Mail::to('nelsonrod10@gmail.com')->send(new RestauranteRegistradoCEO($event));
        //return new RestauranteRegistradoCEO($event);
    }
}
