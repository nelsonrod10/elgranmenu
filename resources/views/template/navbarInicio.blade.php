<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/')}}">
        <img src="{{ asset('img/logo.png')}}" width="200" height="50">
    </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" onclick="$('#navbarBasicExample').toggle()">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
        <a class="navbar-item" href="{{ url('inscripcion-restaurantes') }}/#formulario">Restaurantes</a>
    </div>
  </div>
</nav>

