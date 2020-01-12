<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Verify - AFGaming.gg</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                height: 100%;
                padding: 0px;
                margin: 0px;
                background: #3F51B5;
                color: #fff;
                font-family: 'Roboto', sans-serif;
            }

            .panel {
                background: #039BE5;
                height: 100%;
                border-radius: 10px;
                -webkit-box-shadow: 10px 11px 47px -15px rgba(0, 0, 0, 0.75);
                -moz-box-shadow: 10px 11px 47px -15px rgba(0, 0, 0, 0.75);
                box-shadow: 10px 11px 47px -15px rgba(0, 0, 0, 0.75);
            }

            #start {
                position: absolute;
                height: 100%;
                padding: 30px;
                overflow: auto;
            }

            #start .row {
                
            }

            #start img {
                width: 35%;
                margin: 15% auto;
                border-radius: 50%;
            }

            #start #content {
                position: absolute;
                background: #fff;
                color: #37474F;
                bottom: 0px;
                left: 0px;
                height: 55%;
                border-radius: 0px 0px 10px 10px;
            }

            #start #content h2 {
                margin: 25px 0px 25px 0px;
                font-style: italic;
                text-align: center;
            }

            #start #content hr {
                max-width: 60%;
            }

            #start #content p {
                max-width: 85%;
                margin: 0 auto;
            }

            #start #content a {
                width: 45%;
                margin: 40px auto;
            }

            #start #content a i {
                margin-right: 10px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" id="start">
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}">Logout</a>
            @else
                <a href="{{ url('/login/facebook') }}">Login</a>
            @endauth
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 panel">
            <div class="row">
            <img class="d-flex flex-wrap align-items-center" src="https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/81675168_132606801539585_556426993315348480_n.png?_nc_cat=108&_nc_oc=AQlKSBe5LXmbdMpiQ5Cssey5gVSbu88vuk8e8IAhxKC9YAViD_4_44mHd9QVjuCbZlo&_nc_ht=scontent-icn1-1.xx&oh=798cf55c414ce77d19272b189a662079&oe=5EA74D0C" />
            </div>
            <div class="row">
            <div class="col-12" id="content">
                <h2>Get verified</h2>
                <hr />
                <p class="lead">Start by logging in with your Facebook account. You will then be prompted for your Air Force email address.</p>
                <p>A verification email will then be sent.</p>
                <div class="row">
                <a class="btn btn-lg btn-primary" href="#"><i class="fab fa-facebook"></i> Login</a>
                </div>
            </div>
            </div>
        </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
