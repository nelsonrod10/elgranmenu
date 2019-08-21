@extends('template.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    @include('superAdmin.layout.menu_lateral')
                </div>
                <div class="column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="title">Bienvenido Administrador!!</p>
                    <p class="title is-size-4">Actualizar Listado XML de ingredites</p>
                    <a class="button is-success is-small" href="{{ route('crear-listado-ingredientes')}}">Actualizar</a>
                    <p class="title is-size-4">Listado de sectores</p>
                    <a class="button is-success is-small" href="{{ route('sectores.index')}}">Ver Sectores</a>
                </div>
            </div>
        </div>
    </section>
@endsection
