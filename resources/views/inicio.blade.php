@extends('template.appGTM')
@section('content')
    <router-view :routedemo="'{{url('inscripcion-restaurantes')}}/#formulario'"></router-view>
@endsection
