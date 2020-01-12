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

            .outline {
                border: 1px solid #37474F;
                border-radius: 10px;
                margin: 10px;
            }

            .account {
                padding-left: 30px;
            }

            .account .panel {
                padding: 20px 30px 20px 30px;
                background: #fff;
                color: #000;
            }

            #start {
                position: fixed;
                height: 100%;
                padding: 30px;
                overflow: auto;
            }

            #start .row {
                margin: 0px;
            }

            #start .brand {
                width: 35%;
                margin: 10% auto;
                border-radius: 50%;
            }

            #start #content {
                position: absolute;
                background: #fff;
                color: #37474F;
                bottom: 0px;
                left: 0px;
                height: 65%;
                border-radius: 0px 0px 10px 10px;
                overflow: auto;
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
                margin: 30px auto;
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

            .account .header {
                width: 100%;
                margin: 40px 0px 100px 0px;
                background: #37474F;
                border-radius: 10px;
                color: #fff;
            }

            .account .header .avatar {
                float: left;
                width: 150px;
                margin: -35px auto;
                border: 10px solid #37474F;
                border-radius: 50%;
            }

            .account .header .status {
                float: left;
                margin: 24px 30px 0px 20px;
                font-size: 18pt;
                font-weight: 600;
            }

            .account .header .status span {
                font-size: 12pt;
                font-weight: 400;
            }

            .account h4 {
                margin: 0px 0px 5px 0px;
            }

            .account .card {
                padding: 10px 15px 10px 15px;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" id="start">
            <div class="row" style="height: 100%;">
                <div class="col-sm-12 col-md-6 col-lg-4 panel">
                    <div class="row">
                        <img class="brand d-flex flex-wrap align-items-center" src="https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/81675168_132606801539585_556426993315348480_n.png?_nc_cat=108&_nc_oc=AQlKSBe5LXmbdMpiQ5Cssey5gVSbu88vuk8e8IAhxKC9YAViD_4_44mHd9QVjuCbZlo&_nc_ht=scontent-icn1-1.xx&oh=798cf55c414ce77d19272b189a662079&oe=5EA74D0C" />
                    </div>
                    <div class="row">
                        <div class="col-12" id="content">
                            <h2>Get verified</h2>
                            <hr />
                            <p class="lead">Start by logging in with your Facebook account. You will then be prompted for your Air Force email address.</p>
                            <p>A verification email will then be sent.</p>
                            <div class="row">
                                @auth
                                    <a class="btn btn-lg btn-secondary" href="{{ url('/logout') }}">Logout</a>
                                @else
                                    <a class="btn btn-lg btn-primary" href="{{ url('/login/facebook') }}"><i class="fab fa-facebook"></i> Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    <div class="col-sm-12 col-md-6 col-lg-8 account" style="padding-right: 0px;">
                        <div class="col-sm-12 panel">
                            <!-- Profile Header -->
                            <div class="row">
                                <div class="col-12 header">
                                    <div class="status">Verified <span>2020-01-12</span></div>
                                    <img class="avatar" src="https://scontent-icn1-1.xx.fbcdn.net/v/t1.0-9/66025809_10156297112457327_7832456473002115072_n.jpg?_nc_cat=106&_nc_oc=AQmUSynEmT7B1vgTpoNQCJesrJ0UZc4wRiqYPnwPVbu8nV0xkkklCZLgT3w_JVxjzgU&_nc_ht=scontent-icn1-1.xx&oh=3073cdd2d4d290f801c40743757caaee&oe=5E9EDB43" />
                                </div>
                            </div>
                            <!-- Confirm USAF Email Section -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4><i class="fas fa-exclamation-triangle"></i> - USAF Affiliation Required</h4>
                                    <p>Confirm your duty status below.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="card">
                                        d
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <div class="card">
                                        d
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
