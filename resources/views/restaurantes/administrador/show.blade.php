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
                                <p class="title is-size-4 has-text-centered">{{ $restaurante->id }}</p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">NIT: </label>
                                <span>{{ $restaurante->id }}</span>
                            </div>
                            <div class="column">
                                <label class="label">Dirección: </label>
                                <span>{{ $restaurante->direccion }}</span>
                            </div>
                            <div class="column">
                                <label class="label">Ciudad: </label>
                                <span>{{ $restaurante->ciudad }}</span>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Teléfono: </label>
                                <span>{{ $restaurante->telefono }}</span>
                            </div>
                            <div class="column">
                                <label class="label">Celular: </label>
                                <span>{{ $restaurante->celular }}</span>
                            </div>
                            <div class="column">
                                <label class="label">Horarios: </label>
                                <!--if($restaurante->horarioAtencion)
                                    foreach($restaurante->horarioAtencion as $horario)
                                        <p>{{ $restaurante->horario }}</p>
                                    endforeach
                                else
                                    <p>No se a creado ningún horario</p>
                                endif-->
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                              <div class="buttons is-centered ">
                                    <a class="button is-success is-small" href="">
                                        <span class="icon is-small">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span>Editar Datos</span>
                                    </a>
                                    <a class="button is-info is-small" href="">
                                        <span class="icon is-small">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <span>Horarios</span>
                                    </a>
                                    <a class="button is-danger is-small" onclick="$('#eliminar-restaurante').addClass('is-active')">
                                        <span class="icon is-small">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span>Eliminar</span>
                                    </a>
                              </div>  
                            </div>
                        </div>    
                        <div class="columns is-centered">
                            <div class="column">
                                <div class="columns is-centered">
                                    @if($restaurante->tradicional === 'si')
                                    <div class="column is-4">
                                        <div class="notification is-primary">
                                            <h1 class="title is-4 has-text-centered">Menu Tradicional</h1>
                                            <p class="has-text-justified">Crea el menu tradicional de tu restaurante en este espacio</p>
                                            <div class="has-text-centered">
                                                <a class="button is-dark" href="">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-utensils"></i>
                                                    </span>
                                                    <span>Ver Menu</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @if($restaurante->vegetariano === 'si')
                                    <div class="column is-4">
                                        <div class="notification is-info">
                                            <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                                            <p class="has-text-justified">Crea el menu vegetariano de tu restaurante en este espacio</p>
                                            <div class="has-text-centered">
                                                <a class="button is-dark" href="">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-utensils"></i>
                                                    </span>
                                                    <span>Ver Menu</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @if($restaurante->vegano === 'si')
                                    <div class="column is-4">
                                        <div class="notification is-success">
                                            <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                                            <p class="has-text-justified">Crea el menu vegano de tu restaurante en este espacio</p>
                                            <div class="has-text-centered">
                                                <a class="button is-dark" href="">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-utensils"></i>
                                                    </span>
                                                    <span>Ver Menu</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
<!--MODALS-->
<div id="eliminar-restaurante" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Eliminar Restaurante</p>
      <button class="delete" aria-label="close" onclick="$('#eliminar-restaurante').removeClass('is-active')"></button>
    </header>
    <section class="modal-card-body">
      ¿Está seguro de eliminar el restaurante {{ $restaurante->nombre }}?
    </section>
    <footer class="modal-card-foot">
        <form method="post" action="{{ route('gestion-restaurantes.destroy', $restaurante) }}" name="delete-restaurante">
            @csrf
            @method('DELETE')
            <button class="button is-danger">Eliminar</button>
            <a class="button" onclick="$('#eliminar-restaurante').removeClass('is-active')">Cancel</a>
        </form>
      
    </footer>
  </div>
</div>
@endsection
