@extends('template.appGTM')
@section('content')
    <router-view 
        :routedemo="'{{url('inscripcion-restaurantes')}}/#formulario'"
        :imglovecorrientazo="'{{ asset('img/encantaCorrientazo.png')}}'"    
    >
</router-view>
@endsection
