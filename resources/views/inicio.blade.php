@extends('template.app')
@section('content')
    <router-view :routedemo="'{{url('')}}/#formulario'"></router-view>
@endsection
