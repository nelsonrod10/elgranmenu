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
                    <div class="columns">
                        <div class="column">
                            <p class="title is-size-4 has-text-centered">Restaurantes Administrados</p>
                        </div>
                    </div>    
                    
                    @foreach($restaurantes as $restaurante)
                    <div class="columns">
                        <div class="column is-one-fifth"></div>
                        <div class="column">
                            <p class="title is-size-6">{{$restaurante->nombre}}</p>
                        </div>
                        <div class="column">
                            <a class="button is-link" href="{{route('gestion-restaurantes.show',$restaurante)}}">
                                <span class="icon is-small">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span>Administrar</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection