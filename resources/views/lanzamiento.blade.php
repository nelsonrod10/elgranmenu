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
            <h1 class="title has-text-weight-normal">
                ElGranMenu es una  plataforma que permite de forma fácil y efectiva la difusión de la información de tu negocio.
            </h1>
            <br/>
            <h1 class="subtitle is-size-4 has-text-weight-light">
                De acuerdo a lo que tus clientes y usuarios de la plataforma busquen, podrán saber el menú que tienes para ellos.
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
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Puedes crear, modificar y eliminar tus menús cuantas veces quieras; además de poder clasificarlos como vegetarianos, veganos o tradicionales</p>
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
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Con nuestro sistema, aumentan las posibilidades de que nuevos clientes lleguen a tu negocio; lo único que debes hacer es seguir ofreciendo la mejor experiencia y los mejores platos a tus clientes.</p>
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
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">No más dinero en volantes o papelitos impresos que apenas ven unos pocos. Lo que necesitas es llegar a miles de personas con solo un click!!</p>    
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
                                    <p class="subtitle has-text-justified has-text-grey is-size-6">Al tener tus menus creados en ElGranMenu, podrás administrar y controlar tus inventarios. Y este control de tu negocio genera beneficios invaluables</p>    
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
                              <label class="label">Name</label>
                              <div class="control">
                                <input class="input" type="text" placeholder="Text input">
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Username</label>
                              <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-user"></i>
                                </span>
                                <span class="icon is-small is-right">
                                  <i class="fas fa-check"></i>
                                </span>
                              </div>
                              <p class="help is-success">This username is available</p>
                            </div>

                            <div class="field">
                              <label class="label">Email</label>
                              <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                                <span class="icon is-small is-left">
                                  <i class="fas fa-envelope"></i>
                                </span>
                                <span class="icon is-small is-right">
                                  <i class="fas fa-exclamation-triangle"></i>
                                </span>
                              </div>
                              <p class="help is-danger">This email is invalid</p>
                            </div>

                            <div class="field">
                              <label class="label">Subject</label>
                              <div class="control">
                                <div class="select">
                                  <select>
                                    <option>Select dropdown</option>
                                    <option>With options</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Message</label>
                              <div class="control">
                                <textarea class="textarea" placeholder="Textarea"></textarea>
                              </div>
                            </div>

                            <div class="field">
                              <div class="control">
                                <label class="checkbox">
                                  <input type="checkbox">
                                  I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>

                            <div class="field">
                              <div class="control">
                                <label class="radio">
                                  <input type="radio" name="question">
                                  Yes
                                </label>
                                <label class="radio">
                                  <input type="radio" name="question">
                                  No
                                </label>
                              </div>
                            </div>

                            <div class="field is-grouped">
                              <div class="control">
                                <button class="button is-link">Submit</button>
                              </div>
                              <div class="control">
                                <button class="button is-text">Cancel</button>
                              </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="tile is-6 is-ancestor">
                    
                </div>
            </div>
        </div>
    </section>    
    
@endsection
