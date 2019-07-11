@extends('template.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    Dashboard
                </div>
                <div class="column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="title">Listado de Sectores</p>
                    <a class="button is-success is-small" onclick="$('#crear-sector').addClass('is-active')">Crear Nuevo</a>
                </div>
            </div>    
            
            @foreach($sectores as $sector)
            <div class="columns">
                <div class="column"></div>
                <div class="column">{{$sector->nombre}}</div>
                <div class="column">{{$sector->direccion}}</div>
                <div class="column">{{$sector->ciudad}}</div>
                <div class="column">
                    <a class="button is-link is-small" onclick="$('#editar-sector-{{$sector->id}}').addClass('is-active')">Editar</a>    
                    <a class="button is-danger is-small" onclick="$('#eliminar-sector-{{$sector->id}}').addClass('is-active')">Eliminar</a>
                </div>
            </div>
                @include('superAdmin.sectores.eliminar')
                @include('superAdmin.sectores.editar')
            @endforeach
        </div>
    </section>

<!-- MODALS -->
<div id="crear-sector" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Crear Sector</p>
          <button class="delete" aria-label="close" onclick="$('#crear-sector').removeClass('is-active')"></button>
        </header>
        <form name="crear-sector" method="post" action="{{ route('sectores.store') }}"> <!--  -->  
            @csrf
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label" for="nombre">Nombre</label>
                            <div class="control has-icons-left">
                                <input id="nombre" name="nombre" class="input" required type="text" placeholder="Nombre del sector">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-font"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label" for="tipMenu">Dirección</label>
                            <div class="control has-icons-left">
                                <input id="direccion" name="direccion" class="input" required type="text" placeholder="Dirección del sector">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-font"></i>
                                </span>
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label" for="ciudad">Ciudad</label>
                            <div class="control has-icons-left">
                                <input id="ciudad" name="ciudad" class="input" required type="text" placeholder="Ciudad del sector">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-font"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success">Crear</button>
                <a class="button" onclick="$('#crear-sector').removeClass('is-active')">Cancel</a>
            </footer>
        </form>      
    </div>
</div>



@endsection
