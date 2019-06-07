@extends('template.app')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="box">
                    <label class="label">Cambiar de Password</label>
                    @if (session('status'))
                        <div class="notification is-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="field">
                        <label for="email" class="label">Correo Electrónico</label>
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" class="input @error('email') is-danger @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus="">
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
                        <p class="control">
                            <button type="submit" class="button is-success">
                                Enviar email
                            </button>
                        </p>
                    </div>
                    </form>    
                </div>

            </div>
        </div>
    </div>
@endsection
