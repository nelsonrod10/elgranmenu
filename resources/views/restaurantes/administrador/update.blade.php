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
                        <editar-restaurante :restaurante="{{$restaurante}}"  :routecancelar="'{{route('gestion-restaurantes.index')}}'"></editar-restaurante>    
                        <!--<form name="frm-update-restaurante" method="post" action="{{route('gestion-restaurantes.update',$restaurante)}}">
                            @method('PUT')
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
                                        <input id="nombre" name="nombre" required class="input" type="text" placeholder="Nombre del establecimiento" value="{{ ucwords($restaurante->nombre) }}">
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
                                        <input id="nit" name="nit" required class="input" type="number" placeholder="NIT" value="{{ $restaurante->nit }}">
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
                                        <input id="direccion" name="direccion" required class="input" type="text" placeholder="Dirección del restaurante" value="{{ $restaurante->direccion }}">
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
                                        <input id="ciudad" name="ciudad" required class="input" type="text" placeholder="Ciudad" value="{{ $restaurante->ciudad }}">
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
                                    <label class="label" for="telefono">Teléfono (Domicilios)</label>
                                    <div class="control has-icons-left">
                                        <input id="telefono" name="telefono" class="input" type="number" placeholder="Número Telefónico" value="{{ $restaurante->telefono }}">
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
                                        <input id="celular" name="celular" class="input" type="number" placeholder="Número Celular" value="{{ $restaurante->celular }}">
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
                                            <input id="tradicional" name="tradicional" type="radio" value="si" <?php ($restaurante->tradicional == 'si')?'checked':''?>>
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="tradicional" value="no" <?php ($restaurante->tradicional == 'no')?'checked':''?>>
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
                                            <input id="vegetariano" name="vegetariano" type="radio" value="si" <?php echo ($restaurante->vegetariano == 'si')?'checked':''?>>
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="vegetariano" value="no" <?php ($restaurante->vegetariano == 'no')?'checked':''?>>
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
                                            <input id="vegano" name="vegano" type="radio" value="si" <?php ($restaurante->vegano == 'si')?'checked':''?>>
                                          Si
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="vegano" value="no" <?php ($restaurante->vegano == 'no')?'checked':''?>>
                                          No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="field is-grouped">
                          <div class="control ">
                              <button type="submit" class="button is-primary">Actualizar</button>
                          </div>
                          <div class="control">
                              <a class="button is-text" href="{{route('gestion-restaurantes.show',$restaurante)}}">Cancelar</a>
                          </div>
                        </div>
                        </form>-->    
                    </div>
                </div>    
            </div>
        </div>
    </section>
@endsection
