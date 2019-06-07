@extends('template.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-6">
            <div class="box">
                <label class="label">Registrarse</label>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <label for="name" class="label">Nombre</label>
                    <p class="control has-icons-left has-icons-right">
                        <input id="name" class="input @error('name') is-danger @enderror" type="text" placeholder="Nombre Completo" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                          <i class="fas fa-check"></i>
                        </span>
                    </p>
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <p class="control has-icons-left has-icons-right">
                        <input id="email" class="input @error('email') is-danger @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                      <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span>
                    </p>
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="password" class="label">Password</label>
                    <p class="control has-icons-left">
                        <input id="password" class="input @error('password') is-danger @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password">
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </p>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="password-confirm" class="label">Confirme el password</label>
                    <p class="control has-icons-left">
                        <input id="password-confirm" class="input" type="password" placeholder="Confirme Password"  name="password_confirmation" required autocomplete="new-password">
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </p>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="field">
                    <p class="control">
                        <button type="submit" class="button is-success">
                            Registrarse
                        </button>
                    </p>
                </div>
                </form>    
            </div>
            
        </div>
    </div>
    
</div>
@endsection
