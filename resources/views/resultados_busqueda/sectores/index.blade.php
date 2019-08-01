@extends('template.app')
@section('content')
    <a href="{{url('/')}}">Inicio</a>
    Listado de sectores
    @foreach($sectores as $ciudad => $sector)
    <h1 class="is-size-5"><b>{{$ciudad}}</b></h1>
    <ol>
        @foreach($sector as $dataSector)
            <li>{{$dataSector->nombre}}</li>
        @endforeach
    </ol>    
    @endforeach
    <!--<buscar-platos-del-dia></buscar-platos-del-dia>-->
@endsection