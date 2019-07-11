<div id="editar-sector-{{$sector->id}}" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Editar Sector</p>
          <button class="delete" aria-label="close" onclick="$('#editar-sector-{{$sector->id}}').removeClass('is-active')"></button>
        </header>
        <form name="editar-sector" method="post" action="{{ route('sectores.update',$sector) }}"> <!--  -->  
            @method('PUT')
            @csrf
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label" for="nombre">Nombre</label>
                            <div class="control has-icons-left">
                                <input id="nombre" name="nombre" class="input" required type="text" placeholder="Nombre del sector" value="{{$sector->nombre}}">
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
                                <input id="direccion" name="direccion" class="input" required type="text" placeholder="Dirección del sector" value="{{$sector->direccion}}">
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
                <button class="button is-success">Guardar Cambios</button>
                <a class="button" onclick="$('#editar-sector-{{$sector->id}}').removeClass('is-active')">Cancel</a>
            </footer>
        </form>      
    </div>
</div>