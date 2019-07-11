<div id="eliminar-sector-{{$sector->id}}" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Eliminar Sector</p>
          <button class="delete" aria-label="close" onclick="$('#eliminar-sector-{{$sector->id}}').removeClass('is-active')"></button>
        </header>
        <form name="eliminar-sector" method="post" action="{{route('sectores.destroy',$sector)}}">
            @csrf
            @method('DELETE')
            <section class="modal-card-body">
              ¿Está seguro de eliminar el sector {{$sector->nombre}}?
            </section>
            <footer class="modal-card-foot">
                <button type="submit" class="button is-danger">Eliminar</button>
                <a class="button" onclick="$('#eliminar-sector-{{$sector->id}}').removeClass('is-active')">Cancel</a>
            </footer>
        </form>      
    </div>
</div>