@extends('template.appInicio')
@section('content')
    <router-view 
        :routehome="'{{url('/')}}'"
        :imglovecorrientazo="'{{ asset('img/encantaCorrientazo.png')}}'"    
    >
</router-view>
@endsection
