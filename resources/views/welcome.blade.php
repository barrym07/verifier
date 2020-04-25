@extends('layouts.app')

@section('title', 'Verifier')

@section('css')
<style>
    .server h5 {
        font-size: 18pt;
    }

    .server .details {
        margin-top: 25px;
    }

    .server .details a {
        width: 45%;
        margin: 30px auto;
    }

    i {
        margin-right: 10px;
    }

    .login {
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')
<div class="row no-margin" style="margin-top: 12vh;">
    <div class="col s12 l8 offset-l2">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card server grey darken-4 white-text">
                    <div class="card-content center">
                        <h5>Get started</h5>
                        <div class="row details">
                            <div class="col s12">
                                <p class="lead">Start by logging in with one of your accounts below. You will then be prompted for your Air Force email address.</p>
                                <br />
                                <p>A verification email will then be sent.</p>
                                <br />
                                <p style="font-weight: 600; font-size: 115%;"><i>Please ensure you are in <a href="https://discord.gg/airforcegaming" target="_blank">Discord</a> before attempting verification</i></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l8 offset-l2" style="margin-top: 20px;">
                                @auth
                                    <a class="waves-effect waves-light btn blue" href="{{ url('account') }}"><i class="fas fa-user"></i> Account</a><br/>
                                    <a class="waves-effect waves-light btn blue" style="margin-top: 15px;" href="{{ url('logout') }}">Logout</a>
                                @else
                                    <div class="row">
                                        <div class="col s12">
                                            <a class="waves-effect waves-light btn login blue" href="{{ url('login/discord') }}"><i class="fab fa-discord"></i> Login</a>
                                        </div>
                                    </div>
                                    <!--<blockquote style="margin-top: 40px;">
                                        Not using Facebook? <a href="https://accounts258614.typeform.com/to/kiBVrV">Apply manually</a> instead.
                                    </blockquote>-->
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection