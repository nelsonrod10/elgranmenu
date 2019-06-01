@extends('template.app')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-three-fifths">
                <div class="field ">
                    <div class="control">
                        <label class="label">Hoy quiero comer...</label>
                    </div>
                </div>
                <div class="field has-addons">
                    <div class="control is-expanded">
                      <input list="nombres-platos" class="input" type="text" placeholder="Text input">
                      <datalist id="nombres-platos">
                          <option value="Bandeja Paisa"></option>
                          <option value="Camarones"></option>
                      </datalist>
                    </div>
                    <div class="control">
                        <a class="button is-info" href="{{url('restaurantes')}}">Buscar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column">
                <label class="label has-text-centered">¿No sabes que quieres?... Arma tu menu</label>
            </div>
        </div>    
        <div class="columns is-centered">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <div class="notification is-primary">
                            <h1 class="title is-4 has-text-centered">Menu Tradicional</h1>
                            <p class="has-text-justified">Tu comida acompañada de carnes blancas o rojas en el restaurante de tu preferencia</p>
                            <div class="has-text-centered">
                                <a class="button is-dark" href="{{url('menus')}}">Seleccionar</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-info">
                            <h1 class="title is-4 has-text-centered">Menu Vegetariano</h1>
                            <p class="has-text-justified">Las mejores opciones vegetarianas las puedes encontrar en esta sección</p>
                            <div class="has-text-centered">
                                <a class="button is-dark" href="{{url('menus')}}">Seleccionar</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="column">
                        <div class="notification is-success">
                            <h1 class="title is-4 has-text-centered">Menu Vegano</h1>
                            <p class="has-text-justified">Encuentre en esta sección los restaurantes con los mejores platos veganos.</p>
                            <div class="has-text-centered">
                                <a class="button is-dark" href="{{url('menus')}}">Seleccionar</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection