@extends('template.app')

@section('content')
<br/>
<div class="container">
    <div class="columns is-centered">
        <div class="column is-4">
            <div class="box">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label for="email" class="label">Email</label>
                    <p class="control has-icons-left has-icons-right">
                        <input id="email" class="input @error('email') is-danger @enderror" type="email" placeholder="Email" name="email" required="">
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
                        <input id="password" class="input @error('password') is-danger @enderror" type="password" placeholder="Password" name="password"  required="">
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </p>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                      <label class="checkbox" for="remember">
                        <input type="checkbox" name="remember" id="remember">
                            Recordarme
                      </label>
                    </div>
                </div>    
                <div class="field">
                    <p class="control">
                        <button type="submit" class="button is-success">
                            Login
                        </button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                ¿Olvidó su password?
                            </a>
                        @endif
                    </p>
                </div>
                </form>    
            </div>
            
        </div>
    </div>
    
</div>
@endsection
