<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Air Force Gaming</title>
        
        <link rel="icon" type="image/png" href="img/favicon.png" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,900,900i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://kit.fontawesome.com/e2eb6553b9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @yield('css')
    </head>
    <body>
        <div class="loader valign-wrapper">
            <div class="preloader-wrapper big active" style="margin: 0px auto;">
                <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="background" style="z-index: -1;"></div>
        <div class="row no-margin header deep-purple darken-4">
            <div class="container" style="z-index: +100;">
                <div class="col s12 l8 offset-l2">
                    <ul class="header-nav left">
                        <li><a href="https://airforcegaming.com/"><img class="logo" src="https://cdn.glitch.com/49e8ab49-5e2e-401b-870e-d906216158c8%2Fimage01.png?v=1581937770829" /></a></li>
                        <li><a class="white-text" href="https://news.airforcegaming.com/tag/events/" target="_blank">Events <i class="fas fa-calendar-day"></i></a></li>
                        <li><a class="white-text" href="https://airforcegaming.com//servers.html">Servers <i class="fas fa-server"></i></a></li>
                        <li><a class="white-text" href="#">Teams <i class="fab fa-teamspeak"></i></a></li>
                        <li><a class="white-text" href="https://meet.airforcegaming.com" target="_blank">Collab <i class="fas fa-video"></i></a></li>
                    </ul>
                    <ul class="header-nav hide-on-small-only right">
                        <li><a class="white-text" href="https://news.airforcegaming.com/" target="_blank">News <i class="far fa-newspaper"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="z-index: +100;">
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>