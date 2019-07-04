<div id="eliminar-restaurante-{{$restaurante->id}}" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Eliminar Restaurante</p>
      <button class="delete" aria-label="close" onclick="$('#eliminar-restaurante-{{$restaurante->id}}').removeClass('is-active')"></button>
    </header>
    <section class="modal-card-body">
      ¿Está seguro de eliminar el restaurante {{ $restaurante->nombre }}?
    </section>
    <footer class="modal-card-foot">
        <form method="post" action="{{ route('gestion-restaurantes.destroy', $restaurante) }}" name="delete-restaurante">
            @csrf
            @method('DELETE')
            <button class="button is-danger">Eliminar</button>
            <a class="button" onclick="$('#eliminar-restaurante-{{$restaurante->id}}').removeClass('is-active')">Cancel</a>
        </form>
      
    </footer>
  </div>
</div>