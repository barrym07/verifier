@extends('layouts.app')

@section('title', 'My Account')

@section('css')
<style>
    .server h5 {
        font-size: 18pt;
        font-weight: 600;
        margin: 15px 0px 15px 0px;
    }

    .server .details {
        margin-top: 25px;
    }

    .server .details a {
        width: 45%;
        margin: 30px auto;
    }

    .collection .collection-item {
        border-color: #512da8;
    }

    i {
        margin-right: 10px;
    }

    .avatar {
        width: 100px;
    }

    .account-info {
        font-weight: 800;
    }

    .account-header {
        max-width: 75%;
        margin: 0px auto;
    }

    .account-header img {
        margin-right: 15px;
    }

    .verification h5 {
        font-size: 14pt;
        font-weight: 600;
        padding: 15px;
        margin: 0px;
    }

    .input-field label {
        font-size: 14pt;
        color: #ffff00
    }

    .select-wrapper {
        margin-top: 15px;
    }

    .select-dropdown {
        background: #424242;
        color: #fff;
    }

    .select-dropdown li.disabled, .select-dropdown li.disabled > span, .select-dropdown li.optgroup {
        color: #fff;
        border-bottom: 1px solid #212121;
        opacity: 0.5;
    }

    .dropdown-content li > a, .dropdown-content li > span {
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="row no-margin" style="margin-top: 12vh;">
    <div class="col s12 l6">
        <div class="row">
            <div class="col s12">
                <div class="card server grey darken-4 white-text">
                    <div class="card-content">
                        <div class="account-header valign-wrapper">
                            <div style="margin: 0px auto;">
                                <img class="avatar circle left" src="{{ $user->avatar }}"></img>
                                <h5 class="left" style="line-height: 65px;">My Profile</h5>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col s12">
                                <ul class="collection account-info white-text" style="border-color: #512da8; width: 100%;">
                                    <li class="collection-item center deep-purple darken-1">
                                        <div class="left"><i class="fas fa-user"></i></div>
                                        <span class="center-align">{{ $user->name }}</span>
                                    </li>
                                    <li class="collection-item center deep-purple darken-1">
                                        <div class="left"><i class="fas fa-envelope"></i></div>
                                        <span class="center-align">{{ $user->email }}</span>
                                    </li>
                                    <li class="collection-item center deep-purple darken-1">
                                        <div class="left"><i class="fas fa-mail-bulk"></i></div>
                                        @if (!$user->usaf_email)
                                            <span class="center-align">Total Force Email: Needed</span>
                                        @else
                                        <span class="center-align">{{ $user->usaf_email }}</span>
                                        @endif
                                    </li>
                                    <li class="collection-item center deep-purple darken-1">
                                        <div class="left"><i class="fab fa-discord"></i></div>
                                        @if (!$user->usaf_email)
                                            <span class="center-align">Discord: Needed</span>
                                        @else
                                        <span class="center-align">{{ $user->discordUsername }}</span>
                                        @endif
                                    </li>
                                </ul>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l8 offset-l2 center">
                                @auth
                                <a class="waves-effect waves-light btn-large blue" href="{{ url('logout') }}"><i class="fab fa-facebook"></i> Logout</a>
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
    <div class="col s12 l6">
        @if (!$user->usaf_verified)
            <div class="row">
                <div class="col s12">
                    <div class="card verification deep-orange white-text center-align">
                        <h5>Verification: Required</h5>
                    </div>
                </div>
                @if ($user->usaf_email)
                    <div class="col s12">
                        <div class="card verification green accent-2 black-text center-align">
                            <h5>Email sent</h5>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="col s12">
                        <div class="card verification yellow accent-3 black-text center-align">
                            <h5>Uh-oh!</h5>
                            <ul style="margin: 0px; padding-bottom: 10px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="card server no-buffer grey darken-4 white-text">
                        <div class="card-content center">
                            <form method="post" action="{{ url('/generateVerification') }}" accept-charset="UTF-8">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input placeholder="@us.af.mil" id="email" name="usaf_email" type="email" class="validate white-text">
                                        <label for="email">Total-force email</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input placeholder="@us.af.mil" id="email2" name="email2" type="email" class="validate white-text">
                                        <label for="email2">Verify email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="component">
                                            <option value="" disabled selected>Choose Component</option>
                                            <option value="Active">Active</option>
                                            <option value="Guard">Guard</option>
                                            <option value="Reserve">Reserve</option>
                                        </select>
                                        <label>Service component</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Name#1234" id="discordUsername" name="discordUsername" type="text" class="validate white-text">
                                        <label for="discordUsername">Total-force email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="waves-effect waves-light btn-large blue">Send email</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection