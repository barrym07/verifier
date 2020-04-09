<?php

namespace App\Http\Controllers;

use App\Mail\SendVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
      $user = Auth::user();
      return view('account', ['user' => $user, 'accountsLinked' => $user->identities()]);
    }

    public function emailAuthToken(Request $request) {

      $user = Auth::user();

      $user->usaf_email =  $request->input('email');
      $user->component =  $request->input('component');
      $user->discordUsername =  $request->input('discord');

      $user->save();

      //Mail::to($request->user())->send(new SendVerification());
      Mail::to($user->usaf_email)->send(new SendVerification($user->usaf_email));

      return back();
    }

    public function logout () {
      Auth::logout();
      return redirect()->route('/');
    }
}