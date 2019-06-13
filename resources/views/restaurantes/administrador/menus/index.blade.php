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
