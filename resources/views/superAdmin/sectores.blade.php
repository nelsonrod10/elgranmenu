@extends('template.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    Dashboard
                </div>
                <div class="column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="title">Listado de Sectores</p>
                    
                    <sectores></sectores>
                </div>
                        
            </div>    
        </div>
    </section>

<!-- MODALS -->
@endsection
