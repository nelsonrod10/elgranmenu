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
                                <p class="title is-size-4 has-text-centered">{{ $restaurante->nombre }}</p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">NIT: </label>
                                <span>{{ $restaurante->nit }}</span>
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
                                    <a class="button is-success is-small" href="{{ route('gestion-restaurantes.edit',$restaurante) }}">
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
                                    <a class="button is-danger is-small" onclick="$('#eliminar-restaurante-{{$restaurante->id}}').addClass('is-active')">
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
                                    <div class="column is-4">
                                        <div class="notification is-primary">
                                            <h1 class="title is-4 has-text-centered">Menu Restaurante</h1>
                                            <p class="title is-6 has-text-justified">Gestione todos los platos que ofrece el restaurante.</p>
                                            <div class="has-text-centered">
                                                <a class="button is-dark" href="{{route('listado-carta',$restaurante)}}">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-utensils"></i>
                                                    </span>
                                                    <span>Ver Menu</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
<!--MODALS-->
@include('restaurantes.administrador.delete')
@endsection
