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

    .resend, .discord, .add-account {
        margin: 0px 5px 0px 5px;
        padding: 5px 10px 5px 10px;
        font-size: 70%;
        border-radius: 15px;
        cursor: pointer;
    }

    .accounts i {
        font-size: 20pt;
    }

    .accounts .card {
        text-align: center;
        padding: 50px 15px 50px 15px;
        transition: 0.5s;
        background: #212121;
    }

    .accounts .card:hover {
        transition: 0.5s;
        background: #651fff;
    }

    .accounts .card i {
        font-size: 30pt;
    }

    .accounts .card .connect {
        display: none;
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 100%;
        font-size: 12pt;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
<div class="row no-margin" style="margin-top: 12vh;">
    @if ($user->usaf_verified)
        <div class="col s12 l6 offset-l3">
    @else
        <div class="col s12 l6">
    @endif
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
                            <div class="col s12 center">
                                <h5 style="font-size: 14pt; margin-bottom: 20px;">Linked Accounts <a class="add-account grey-text text-darken-4 waves-effect waves-dark modal-trigger" href="#linkAccounts" style="background: #fff; border-radius: 15px;">Add</a></h5>
                                <div class="row">
                                    <div class="col s12 accounts">
                                        @foreach ($accountsLinked as $account)
                                        <i class="fab fa-{{ $account->provider_name }}"></i>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                                        @if (!$user->discordUsername)
                                            <span class="center-align">Discord: Needed</span>
                                        @else
                                        <span class="center-align">{{ $user->discordUsername }}</span>
                                        @endif
                                    </li>
                                    @if ($user->usaf_verified)
                                        <li class="collection-item center deep-purple darken-1">
                                            <div class="left"><i class="fas fa-user-check"></i></div>
                                            <span class="center-align">Verified</span>
                                        </li>
                                    @endif
                                </ul>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l8 offset-l2 center">
                                @auth
                                <a class="waves-effect waves-light btn-large blue" href="{{ url('logout') }}">Logout</a>
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
                <div class="col s12">
                    <div class="card verification blue lighten-1 white-text center-align">
                        <h5>Join <a class="discord" href="https://discord.gg/airforcegaming" target="_blank" style="background: #fff; border-radius: 15px;">Discord</a> before proceeding</i></h5>
                    </div>
                </div>
                @if ($user->usaf_email)
                    <div class="col s12">
                        <div class="card verification green accent-2 black-text center-align">
                            <h5 class="black-text">Email sent <a href="{{ url('/resend') }}" style="text-decoration: none; color: #212121;"><span class="resend light-green accent-4">Re-send</span></a></h5>
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
                                @if (!$user->discordUsername)
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="Name#1234" id="discordUsername" name="discordUsername" type="text" class="validate white-text">
                                            <label for="discordUsername">Discord Username</label>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="{{ $user->discordUsername }}" value="{{ $user->discordUsername }}" id="discordUsername"  name="discordUsername" type="hidden" class="validate white-text">
                                        </div>
                                    </div>
                                @endif
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

<!-- modals -->
<div id="linkAccounts" class="modal modal-fixed-footer">
    <div class="modal-content accounts">
        <div class="row">
            <h4>Linked Accounts</h4>
            <p>Here you can link and manage 3rd-party accounts to your Air Force Gaming (AFG) account. AFG will only utilize 3rd-party account information to help prove social identities across major gaming platforms.</p>
        </div>
        <div class="row">
            <div class="col s12">
                <h5>Connected</h5>
            </div>
            @foreach ($accountsLinked as $account)
                <div class="col s6 m3">
                    <div class="card valign-wrapper grey darken-4 white-text z-depth-2">
                        <i class="fab fa-{{ $account->provider_name }}" style="margin: 0px auto;"></i>
                    </div>
                </div>                 
            @endforeach
        </div>
        <div class="row">
            <div class="col s12">
                <h5>Not Connected</h5>
            </div>
            @if (DB::table('social_identities')->where([['user_id', '=', $user->id], ['provider_name', '=', 'facebook']])->get() == '[]')
                <div class="col s6 m3">
                    <a href="{{ url('connect/facebook') }}">
                        <div class="card not-connected valign-wrapper white-text z-depth-3" id="facebook">
                            <i class="fab fa-facebook" style="margin: 0px auto;"></i><br/>
                            <div class="connect center-text" id="connect-facebook">
                                <p>Connect</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if (DB::table('social_identities')->where([['user_id', '=', $user->id], ['provider_name', '=', 'discord']])->get() == '[]')
                <div class="col s6 m3">
                    <a href="{{ url('connect/discord') }}">
                        <div class="card not-connected valign-wrapper white-text z-depth-3" id="discord">
                            <i class="fab fa-discord" style="margin: 0px auto;"></i><br/>
                            <div class="connect center-text" id="connect-discord">
                                <p>Connect</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if (DB::table('social_identities')->where([['user_id', '=', $user->id], ['provider_name', '=', 'steam']])->get() == '[]')
                <div class="col s6 m3">
                    <div class="card not-connected valign-wrapper white-text z-depth-3" id="steam">
                        <i class="fab fa-steam" style="margin: 0px auto;"></i><br/>
                        <div class="connect center-text" id="connect-steam">
                            <p>Soon!</p>
                        </div>
                    </div>
                </div>
            @endif
            @if (DB::table('social_identities')->where([['user_id', '=', $user->id], ['provider_name', '=', 'battlenet']])->get() == '[]')
                <div class="col s6 m3">
                    <div class="card not-connected valign-wrapper white-text z-depth-3" id="battlenet">
                        <i class="fab fa-battle-net" style="margin: 0px auto;"></i><br/>
                        <div class="connect center-text" id="connect-battlenet">
                            <p>Soon!</p>
                        </div>
                    </div>
                </div>
            @endif
            @if (DB::table('social_identities')->where([['user_id', '=', $user->id], ['provider_name', '=', 'live']])->get() == '[]')
                <div class="col s6 m3">
                    <div class="card not-connected valign-wrapper white-text z-depth-3" id="microsoft">
                        <i class="fab fa-windows" style="margin: 0px auto;"></i><br/>
                        <div class="connect center-text" id="connect-microsoft">
                            <p>Soon!</p>
                        </div>
                    </div>
                </div>
            @endif
            </div> 
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Done</a>
        </div>
    </div>
</div>
@endsection