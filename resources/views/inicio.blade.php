@extends('template.appGTM')
@section('content')
    <router-view :routedemo="'{{url('')}}/#formulario'"></router-view>
@endsection
