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
                        <editar-restaurante :restaurante="{{$restaurante}}"  :routecancelar="'{{route('gestion-restaurantes.index')}}'" :routeshow="'{{route('gestion-restaurantes.show','*')}}'"></editar-restaurante>    
                    </div>
                </div>    
            </div>
        </div>
    </section>
@endsection
