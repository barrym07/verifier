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
                background: #3e3e3e;
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
                margin: 15% auto;
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
                margin: 24px 30px 24px 20px;
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
                        <img class="brand d-flex flex-wrap align-items-center" src="https://cdn.glitch.com/49e8ab49-5e2e-401b-870e-d906216158c8%2Fimage01.png?v=1581937770829" />
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
                                  @if (Auth::user()->usaf_verified)
                                    <div class="status">Verified <span>2020-01-12</span></div>
                                  @else
                                    <div class="status">Not Verified</div>
                                  @endif
                                </div>
                            </div>
                            @if (!Auth::user()->usaf_verified)
                                <!-- Confirm USAF Email Section -->
                                <form method="post" action="{{ url('/generateVerification') }}" accept-charset="UTF-8">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="email" name="email" class="form-control" placeholder="USAF Email">
                                        </div>
                                        <div class="col">
                                            <input type="email" class="form-control" placeholder="Confirm USAF Email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                        <select name="component" class="form-control">
                                            <option selected>Componennt...</option>
                                            <option value="Active Duty">Active Duty</option>
                                            <option value="Guard">Guard</option>
                                            <option value="Reserve">Reserve</option>
                                        </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="discord" class="form-control" placeholder="Discord i.e Name#1234">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send email</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
