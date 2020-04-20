@extends('layouts.app')

@section('title', 'Success!')

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
                        <h5>Success!</h5>
                        <div class="row details">
                            <div class="col s12">
                                <p class="lead">Thanks for verifying and joining our community.</p>
                                <br />
                                <p>head on over to Discord and have fun.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection