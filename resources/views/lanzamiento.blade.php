@extends('template.app')
@section('content')
    <section class="hero is-warning is-medium">
        <div class="hero-body">
          <div class="container">
            <h1 class="title is-size-2">
              ¿Quieres fidelizar y ganar más clientes? 
            </h1>
            <h1 class="title is-size-4">
              Difunde y administra el menú de tu negocio 
            </h1>  
            <h1 class="title is-size-4">
              Aumenta tus ventas y fideliza clientes 
            </h1>
          </div>
        </div>
    </section>
    <section class="hero is-light">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h2 class="subtitle">
              No somos una app de domicilios…
            </h2>  
            <h1 class="title">
              Nuestro único objetivo es que 
            </h1>
            <h1 class="title">
              + clientes lleguen a tu negocio. 
            </h1>  
            
          </div>
        </div>
    </section>
    
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="tile is-ancestor">
                    <div class="tile is-6 is-vertical is-parent">
                      <div class="tile is-child">
                        <p class="title">Característica One</p>
                        <p class="subtitle">texto One</p>
                      </div>
                      <div class="tile is-child">
                        <p class="title">Característica Two</p>
                        <p class="subtitle">texto Two</p>
                      </div>
                    </div>
                    <div class="tile is-vertical is-parent">
                      <div class="tile is-child">
                        <p class="title">Caracteristica Three</p>
                        <p class="subtitle">texto Three</p>    
                      </div>
                      <div class="tile is-child">
                        <p class="title">Caracteristica Four</p>
                        <p class="subtitle">texto Four</p>    
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-dark is-bold">
        <div class="hero-body">
          <div class="container has-text-centered">
            <h1 class="title">
                Conoce nuestro demo y registrate ahora mismo  
            </h1>
              <a class="button">Ver Demo</a>
          </div>
        </div>
    </section>
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="tile is-ancestor">
                    <div class="tile is-5 is-vertical is-parent">
                        <div class="tile is-child">
                          <p class="title">Llamado a la acción</p>
                          <p class="subtitle">estamos de lanzamiento y queremos que tu negocio haga partte del inicio de esta gran experiencia</p>
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
