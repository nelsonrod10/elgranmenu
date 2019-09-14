<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="stylesheet" href="{{ asset('css/app.css')}}">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WL78652');</script>
    <!-- End Google Tag Manager -->
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WL78652"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->    
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