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
                                <p class="title is-size-4 has-text-centered">Listado de platos {{ $restaurante->nombre }}</p>
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
                        @if(count($carta) > 0)
                            @foreach($carta as $platoCarta)
                                <div class="columns has-text-centered">
                                    <div class="column">
                                        Nombre de plato
                                    </div>
                                    <div class="column">
                                        Especial / Corriente
                                    </div>
                                    <div class="column">
                                        Tradicional/Vegetariano/Vegano
                                    </div>
                                    <div class="column">
                                        $ 8500
                                    </div>
                                    <div class="column is-3">
                                        <div class="buttons is-centered ">
                                            <a class="button is-success is-small" href="">
                                                <span class="icon is-small">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span>Editar</span>
                                            </a>
                                            <a class="button is-danger is-small" onclick="$('#eliminar-plato').addClass('is-active')">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span>Eliminar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="columns is-centered">
                                <div class="column">
                                    <div class="columns is-centered">
                                        <div class="column is-4">
                                            <div class="notification is-info">
                                                <p class="has-text-centered">No se ha creado ningún plato</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="columns has-text-centered">
                            <div class="column ">
                                <a class="button " href="{{ route('crear-plato-carta',$restaurante)}}">Agrear Nuevo Plato</a>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
<!--MODALS-->
<div id="eliminar-plato" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Eliminar Restaurante</p>
      <button class="delete" aria-label="close" onclick="$('#eliminar-plato').removeClass('is-active')"></button>
    </header>
    <section class="modal-card-body">
      ¿Está seguro de eliminar el restaurante {{ $restaurante->nombre }}?
    </section>
    <footer class="modal-card-foot">
        <form method="post" action="{{ route('gestion-carta.destroy', $restaurante) }}" name="delete-plato-carta">
            @csrf
            @method('DELETE')
            <button class="button is-danger">Eliminar</button>
            <a class="button" onclick="$('#eliminar-plato').removeClass('is-active')">Cancel</a>
        </form>
    </footer>
  </div>
</div>
@endsection
