@extends('template.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    @include('restaurantes.administrador.layout.menu_lateral')
                </div>
                
                <div class="column">
                    <div class="tabs">
                        <ul>
                            <li class="is-active"><a href="{{route('gestion-restaurantes.index')}}">Listado</a></li>
                            <li><a href="{{route('gestion-restaurantes.create')}}">Crear Nuevo</a></li>
                        </ul>
                    </div>
                    Este es el listado de restaurantes del administrador
                </div>
            </div>
        </div>
    </section>
@endsection