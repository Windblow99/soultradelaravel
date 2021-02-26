<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    </head>

    <style>
    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-image: url("/storage/img/bg.jpg");
    min-height: 100%;
    background-position: center;
    background-size: cover;
    }
    </style>

    <body>
        @include('inc.navbar')

        <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
            <div class="w3-display-middle">
                <h1 class="w3-jumbo w3-animate-top">Never be alone.</h1>
                <hr class="w3-border-grey" style="margin:auto;width:40%">
                <p class="w3-large w3-center">Join today.</p>
            </div>
            <div class="w3-display-bottomleft w3-padding-large">
                CSS Template provided by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
            </div>
        </div>
    </body>
</html>
