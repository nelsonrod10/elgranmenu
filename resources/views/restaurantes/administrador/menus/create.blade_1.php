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
                        <form name="frm-crear-restaurante" method="post" action="{{route('gestion-restaurantes.store')}}">
                            @csrf
                        <div class="columns">
                            <div class="column ">
                                <div class="field  has-text-centered">
                                    <label class="title is-size-4">Datos Generales</label>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label" for="nombre">Nombre Restaurante</label>
                                    <div class="control has-icons-left">
                                        <input id="nombre" name="nombre" required class="input" type="text" placeholder="Nombre del establecimiento">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label" for="nit">Nit</label>
                                    <div class="control has-icons-left">
                                        <input id="nit" name="nit" required class="input" type="number" placeholder="NIT">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-sort-numeric-up"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label" for="direccion">Dirección</label>
                                    <div class="control has-icons-left">
                                        <input id="direccion" name="direccion" required class="input" type="text" placeholder="Dirección del restaurante">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label" for="ciudad">Ciudad</label>
                                    <div class="control has-icons-left">
                                        <input id="ciudad" name="ciudad" required class="input" type="text" placeholder="Ciudad">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label" for="telefono">Teléfono</label>
                                    <div class="control has-icons-left">
                                        <input id="telefono" name="telefono" class="input" type="number" placeholder="Número Telefónico">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label" for="celular">Celular</label>
                                    <div class="control has-icons-left">
                                        <input id="celular" name="celular" class="input" type="number" placeholder="Número Celular">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-mobile-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column ">
                                <div class="field has-text-centered">
                                    <label class="title is-size-4">Tipos de Menu</label>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-4">
                                <div class="field">
                                    <label class="label" for="tradicional">Tradicional</label>
                                    <div class="control">
                                        <label class="radio">
                                            <input id="tradicional" name="tradicional" type="radio" value="si">
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="tradicional" checked="" value="no">
                                          No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label" for="vegetariano">Vegetariano</label>
                                    <div class="control">
                                        <label class="radio">
                                            <input id="vegetariano" name="vegetariano" type="radio" value="si">
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="vegetariano" checked="" value="no">
                                          No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label" for="vegano">Vegano</label>
                                    <div class="control">
                                        <label class="radio">
                                            <input id="vegano" name="vegano" type="radio" value="si">
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="vegano" checked="" value="no">
                                          No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="field is-grouped">
                          <div class="control ">
                              <button type="submit" class="button is-primary">Crear</button>
                          </div>
                          <div class="control">
                              <button type="button" class="button is-text">Cancelar</button>
                          </div>
                        </div>
                        </form>    
                    </div>
                </div>    
            </div>
        </div>
    </section>
@endsection
