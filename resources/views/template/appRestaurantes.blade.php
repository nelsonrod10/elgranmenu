<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="stylesheet" href="{{ asset('css/app.css')}}">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.googleTagManager')
        <div id="app">
            @include('template.navbarRestaurantes')
            <div style="min-height: 400px; height: auto">
                @yield('content')
            </div>    
            
            @include('template.footer')
        </div>
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
    
</html>