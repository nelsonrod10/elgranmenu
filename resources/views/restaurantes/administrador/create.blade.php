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
                            <li><a href="{{route('gestion-restaurantes.index')}}">Listado</a></li>
                            <li class="is-active"><a>Crear Nuevo</a></li>
                        </ul>
                    </div>
                
                    <div class="box">
                        <crear-restaurante :sectores="{{$sectores}}" :routecancelar="'{{route('gestion-restaurantes.index')}}'"></crear-restaurante>
                    </div>
                </div>    
            </div>
        </div>
    </section>
@endsection
