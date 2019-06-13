<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/')}}">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
        <!--<a class="navbar-item">
          Home
        </a>

        <a class="navbar-item">
          Documentation
        </a>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              More
            </a>

            <div class="navbar-dropdown">
                <a class="navbar-item">
                  About
                </a>
                <a class="navbar-item">
                  Jobs
                </a>
                <a class="navbar-item">
                  Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  Report an issue
                </a>
            </div>
        </div>-->
    </div>

    <div class="navbar-end">
        @guest
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="{{ route('login') }}">
                        <strong>Usuarios</strong>
                    </a>
                    @if (Route::has('register'))
                        <a class="button is-primary" href="{{ route('register') }}">
                            <strong>Registrarse</strong>
                        </a>
                    @endif
                </div>
            </div>
                
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('home') }}">
                            Inicio
                        </a>
                        <a class="navbar-item">
                            Editar Perfil
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="{{route('gestion-restaurantes.index')}}">
                            Listado Restaurantes
                        </a>
                        <a class="navbar-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             Salir
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
      
    </div>
  </div>
</nav>

