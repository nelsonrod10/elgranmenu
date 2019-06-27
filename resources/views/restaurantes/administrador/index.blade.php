<div class="columns">
    <div class="column">
        <p class="title is-size-4 has-text-centered">Restaurantes Administrados</p>
    </div>
</div>
@foreach($restaurantes as $restaurante)
    <div class="columns">
        <div class="column">
            <p class="title is-size-5">{{$restaurante->nombre}}</p>
        </div>
        <div class="column">
            <a class="button is-info" href="{{route('gestion-restaurantes.show',$restaurante)}}">
                <span class="icon is-small">
                    <i class="fas fa-check"></i>
                </span>
                <span>Datos Generales</span>
            </a>
            <a class="button is-link" href="{{route('listado-carta',$restaurante)}}">
                <span class="icon is-small">
                    <i class="fas fa-check"></i>
                </span>
                <span>Ver Menu</span>
            </a>
        </div>
    </div>
@endforeach
