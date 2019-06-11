@extends('template.app')
    
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    @include('restaurantes.administrador.layout.menu_lateral')
                </div>
                
                <div class="column">
                    <div class="box">
                        <div class="columns">
                            <div class="column">
                                <p class="title is-size-4 has-text-centered">{{$restaurante->nombre}}</p>
                                <p class="title is-size-4 has-text-centered">Crear un nuevo plato</p>
                            </div>
                        </div>
                        <div class="columns has-text-centered">
                            <div class="column">
                                <label class="label">Nombre </label>
                            </div>
                            <div class="column">
                                <label class="label">Menu </label>
                            </div>
                            <div class="column">
                                <label class="label">Tipo </label>
                            </div>
                            <div class="column">
                                <label class="label">Precio </label>
                            </div>
                            <div class="column  is-3"></div>
                        </div>
                        
                    </div>
                </div>    
            </div>
        </div>
    </section>
@endsection
