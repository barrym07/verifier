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
                                <p class="lead">Start by logging in with your Facebook account. You will then be prompted for your Air Force email address.</p>
                                <br />
                                <p>A verification email will then be sent.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l8 offset-l2">
                                @auth
                                    <a class="waves-effect waves-light btn-large blue" style="margin-bottom: 25px;" href="{{ url('account') }}"><i class="fas fa-user"></i> Account</a>
                                    <a class="waves-effect waves-light btn blue" href="{{ url('logout') }}"><i class="fab fa-facebook"></i> Logout</a>
                                @else
                                    <a class="waves-effect waves-light btn-large blue" href="{{ url('login/facebook') }}"><i class="fab fa-facebook"></i> Login</a>
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