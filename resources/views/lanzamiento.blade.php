@extends('template.app')
@section('content')
    <section class="hero is-primary is-bold is-fullheight">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title is-size-2">
              Muchos conocen tu negocio, pero... 
            </h1>
            <h1 class="title is-size-2">
              ¿Cuantos conocen el menú que ofrecerás hoy?
            </h1>  
          </div>
        </div>
    </section>

    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered  is-centered">
                    <div class="column is-2">
                        <figure class="image is-128x128">
                            <img class="is-rounded" src="{{ asset('img/step1.png')}}">
                        </figure>

                    </div>
                    <div class="column is-6">
                        <p class="subtitle has-text-centered has-text-grey is-size-4">Creas tus platos del día o de la carta, y los subes para que sean visibles.</p>
                    </div>
                </div>
                <br/>
                <div class="columns is-vcentered  is-centered">
                    <div class="column is-2">
                        <figure class="image is-128x128">
                            <img class="is-rounded" src="{{ asset('img/step2.png')}}">
                        </figure>
                    </div>
                    <div class="column is-6">
                        <p class="subtitle has-text-centered has-text-grey is-size-4">Los usuarios buscan que quieren comer de acuerdo al nombre del plato, ingrediente o tipo de Menú (Vegetariano, Vegano, Tradicional).</p>
                    </div>

                </div>
                <br/>
                <div class="columns is-vcentered  is-centered">
                    <div class="column is-2">
                        <figure class="image is-128x128">
                            <img class="is-rounded" src="{{ asset('img/step3.png')}}">
                        </figure>
                    </div>
                    <div class="column is-6">
                        <p class="subtitle has-text-centered  is-vcentered has-text-grey is-size-4">Si la busqueda coincide con tus platos, los usuarios podrán seleccionar tu restaurante.</p>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-light is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="container has-text-centered">
                    <h1 class="title is-size-2">
                      Nuestro objetivo es que <span class="is-size-1">+</span> Clientes lleguen a tu negocio. 
                    </h1>
                    <h1 class="title">
                        
                    </h1>  
                </div>      
                <div class="container has-text-centered">
                    <h1 class="title is-size-4  has-text-weight-light">
                        Fideliza y gana más clientes 
                    </h1>
                    <h1 class="title is-size-4 has-text-weight-light">
                        Administra tus inventarios
                    </h1>  
                    <h1 class="title is-size-4 has-text-weight-light">
                        Aumenta tus ventas 
                    </h1>
                </div>
                
            </div>
        </div>
    </section>
    <section class="hero is-dark">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title has-text-weight-light">
                Somos la única  plataforma donde encontrarán a tu negocio de acuerdo al menú que ofreces.
            </h1>
          </div>      
        </div>
    </section>
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-5">
                        <div class="tile">
                            <div class="tile is-parent">
                                <div class="tile is-child box">
                                    <figure class="image is-4by3">
                                        <img src="{{ asset('img/customize.png')}}">
                                    </figure>
                                    <p class="title has-text-centered ">Personalizable</p>
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Puedes crear, modificar y eliminar tus menús; crear <i><b>platos del día o de la carta</b></i>, clasificarlos como vegetarianos, veganos o tradicionales. Logrando que tus clientes encuentren tu menú mucho más fácil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile is-vertical is-2">
                        <div class="tile">
                            <div class="tile is-parent">
                                
                            </div>
                        </div>
                    </div>
                    <div class="tile is-vertical is-5">
                        <div class="tile">
                            <div class="tile is-parent">
                                <div class="tile is-child box">
                                    <figure class="image is-4by3">
                                        <img src="{{ asset('img/sells.jpg')}}">
                                    </figure>
                                    <p class="title has-text-centered">Aumenta tus ventas</p>
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Con nuestro sistema, aumentan las posibilidades de que <i><b>nuevos clientes lleguen a tu negocio</b></i>; lo único que debes hacer es seguir ofreciendo la mejor experiencia y los mejores platos a tus clientes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-5">
                        <div class="tile">
                            <div class="tile is-parent">
                                <div class="tile is-child box">
                                    <figure class="image is-4by3">
                                        <img src="{{ asset('img/savemoney.jpg')}}">
                                    </figure>
                                    <p class="title has-text-centered">Economiza</p>
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">No más dinero en volantes o papelitos impresos que apenas ven unos pocos. Lo que necesitas es <i><b>llegar a miles de personas</b></i> con solo un click!!, y aprovechar una herramienta publicitaria mucho más poderosa.</p>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile is-vertical is-2">
                        <div class="tile">
                            <div class="tile is-parent">
                                
                            </div>
                        </div>
                    </div>
                    <div class="tile is-vertical is-5">
                        <div class="tile">
                            <div class="tile is-parent">
                                <div class="tile is-child box">
                                    <figure class="image is-4by3">
                                        <img src="{{ asset('img/managment.jpg')}}">
                                    </figure>
                                    <p class="title has-text-centered">Administra</p>
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Al tener tus menus creados en ElGranMenu, podrás administrar y controlar tus inventarios. Y este control de tu negocio genera beneficios invaluables.    
                                    Y lo más importante si <i><b>administras varios restaurantes</b></i>, podrás manejarlos todos desde un solo lugar.</p>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-warning is-bold">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title is-size-2">
                Conoce nuestro demo y registrate ahora mismo  
            </h1>
              <a class="button" href="{{url('demo')}}">Ver Demo</a>
          </div>
        </div>
    </section>
    <section id="formulario" class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="tile is-ancestor">
                    <div class="tile is-5 is-vertical is-parent">
                        <div class="tile is-child">
                            <p class="title">Estamos de lanzamiento</p>
                          <p class="subtitle is-size-6 has-text-weight-light">Queremos que tu negocio haga parte de nuestra plataforma, así que te invitamos a inscribirte.</p>
                          <p class="subtitle is-size-6 has-text-weight-light">Luego de la inscripción uno de nuestros asesores te contactará para darte toda la información y aclarar tus dudas.</p>
                        </div>
                    </div>
                    <div class="tile is-vertical is-parent">
                        <div class="tile is-child">
                            <div class="field">
                                <label class="label" for="restaurante">Nombre del Restaurante</label>
                                <div class="control">
                                    <input id="restaurante" name="restaurante" required="" class="input" type="text" placeholder="Nombre del restaurante">
                                </div>
                            </div>
                            <div class="field">
                              <label class="label" for="direccion">Direccion</label>
                              <div class="control has-icons-left">
                                    <input id="direccion" name="direccion" required="" class="input" type="text" placeholder="Dirección del Restaurante">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-map-marker-alt"></i>
                                    </span>
                              </div>
                              <!--<p class="help is-success">This username is available</p>-->
                            </div>

                            <div class="field">
                              <label class="label" for="contacto">Administrador / Contacto</label>
                              <div class="control has-icons-left">
                                  <input id="contacto" name="contacto" required="" class="input" type="text" placeholder="Nombre del contacto o administrador">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-user"></i>
                                    </span>
                              </div>
                            </div>

                            <div class="field">
                              <label class="label" for="email">Email</label>
                              <div class="control has-icons-left">
                                  <input id="email" name="email" required="" class="input" type="email" placeholder="email contacto o administrador">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                              </div>
                            </div>
                            
                            <div class="field">
                              <label class="label" for="telefono">Teléfono</label>
                              <div class="control has-icons-left">
                                  <input id="telefono" name="telefono" class="input" type="text" placeholder="Teléfono contacto o administrador">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-phone"></i>
                                    </span>
                              </div>
                            </div>
                            <div class="field">
                                <label class="label" for="comentarios">Comentarios</label>
                              <div class="control">
                                  <textarea id="comentarios" name="comentarios" class="textarea" placeholder="Comentarios adicionales"></textarea>
                              </div>
                            </div>

                            <div class="field is-grouped">
                              <div class="control">
                                <button class="button is-success">Enviar</button>
                              </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>    
    
@endsection
