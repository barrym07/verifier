<?php

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    if (Auth::User()) {
        redirect()->route('/account');
    }
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')
            ->where('provider','battlenet|discord|facebook|live|steam');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')
            ->where('provider','battlenet|discord|facebook|live|steam');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('connect/{provider}', 'AccountController@connectProvider')
            ->where('provider','battlenet|discord|facebook|live|steam');

Route::get('/account', 'AccountController@show')->middleware('auth');
Route::get('/account/{user}/delete', 'AccountController@deleteUser')->middleware('auth');
Route::get('/account/{user}/elevate', 'AccountController@addAdmin')->middleware('auth');
Route::get('/account/{user}/downgrade', 'AccountController@removeAdmin')->middleware('auth');
Route::get('/account/{user}/verify', 'AccountController@adminVerified')->middleware('auth');

Route::post('/generateVerification', 'AccountController@emailAuthToken');
Route::get('/resend', 'AccountController@resendEmailAuthToken');
Route::get('/verify/{token}', 'AccountController@handleVerifyAttempt');