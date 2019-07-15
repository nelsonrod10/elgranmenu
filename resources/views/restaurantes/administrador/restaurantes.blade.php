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
                            <li><a href="{{route('crear-restaurante')}}">Crear Nuevo</a></li>
                        </ul>
                    </div>
                        
                    @include('restaurantes.administrador.index', ['restaurantes'=>$restaurantes])
                    
                </div>
            </div>
        </div>
    </section>
@endsection