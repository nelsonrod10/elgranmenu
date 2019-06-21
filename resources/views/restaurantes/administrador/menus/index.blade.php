@extends('template.app')
    
@section('content')

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    @include('restaurantes.administrador.layout.menu_lateral')
                </div>
                
                <platos-menu :restaurante="{{$restaurante}}" ></platos-menu>
            </div>
        </div>
    </section>
@endsection
