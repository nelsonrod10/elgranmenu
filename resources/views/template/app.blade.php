<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            @include('template.navbar')
            <br/>
            <div style="min-height: 400px; height: auto">
                @yield('content')
            </div>    
            
            @include('template.footer')
        </div>
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
    
</html>