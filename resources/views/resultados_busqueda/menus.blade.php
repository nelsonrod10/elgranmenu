@extends('template.app')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <p class="title has-text-centered">Menus Tradicionales cerca de tu ubicación</p>
            </div>
        </div>    
        <div class="columns is-centered">
            <div class="column is-four-fifths">
                <h1 id="#" class="title is-4 is-spaced bd-anchor-title">
                    <a class="bd-anchor-link" href="#">#</a>
                    <span class="bd-anchor-name">Menus con pollo</span>
                </h1>
                <div class="box">
                    <div class="columns is-vcentered">
                        <div class="column is-three-fifths">
                            <h1 class="title is-5">Nombre del Plato 1 </h1>
                            <p class="subtitle is-6">Delicioso "nombre del plato" bañando en salsa de XXX acompañado de papitas chips, con salsa de ajo</p>
                        </div>
                        <div class="column">
                            <span class="has-text-danger">
                                3 Restaurantes tienen este menu
                            </span>
                        </div>
                        <div class="column">
                            <div class="has-text-centered">
                                <a class="button is-info" href="{{url('restaurantes')}}">Ver más</a>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="box">
                    <div class="columns is-vcentered">
                        <div class="column is-three-fifths">
                            <h1 class="title is-5">Nombre del Plato 2 </h1>
                            <p class="subtitle is-6">Delicioso "nombre del plato" bañando en salsa de XXX acompañado de papitas chips, con salsa de ajo</p>
                        </div>
                        <div class="column">
                            <span class="has-text-danger">
                                1 Restaurante tienen este menu
                            </span>
                        </div>
                        <div class="column">
                            <div class="has-text-centered">
                                <a class="button is-info" href="{{url('restaurantes')}}">Ver más</a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-four-fifths">
                <h1 id="#" class="title is-4 is-spaced bd-anchor-title">
                    <a class="bd-anchor-link" href="#">#</a>
                    <span class="bd-anchor-name">Menus con carne de res</span>
                </h1>
                <div class="box">
                    <div class="columns is-vcentered">
                        <div class="column is-three-fifths">
                            <h1 class="title is-5">Nombre del Plato 1 </h1>
                            <p class="subtitle is-6">Delicioso "nombre del plato" bañando en salsa de XXX acompañado de papitas chips, con salsa de ajo</p>
                        </div>
                        <div class="column">
                            <span class="has-text-danger">
                                5 Restaurantes tienen este menu
                            </span>
                        </div>
                        <div class="column">
                            <div class="has-text-centered">
                                <a class="button is-info" href="{{url('restaurantes')}}">Ver más</a>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="box">
                    <div class="columns is-vcentered">
                        <div class="column is-three-fifths">
                            <h1 class="title is-5">Nombre del Plato 2 </h1>
                            <p class="subtitle is-6">Delicioso "nombre del plato" bañando en salsa de XXX acompañado de papitas chips, con salsa de ajo</p>
                        </div>
                        <div class="column">
                            <span class="has-text-danger">
                                2 Restaurantes tienen este menu
                            </span>
                        </div>
                        <div class="column">
                            <div class="has-text-centered">
                                <a class="button is-info" href="{{url('restaurantes')}}">Ver más</a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
    </div>
</section>  

@endsection