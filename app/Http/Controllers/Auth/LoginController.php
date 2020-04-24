<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SocialIdentity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Redirect the user to the OAuth authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if ($provider === 'discord') {
            return Socialite::driver($provider)
                ->setScopes(['identify', 'email', 'guilds', 'guilds.join'])
                ->redirect();
        } else {
            return Socialite::with($provider)->redirect();
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                    ->whereProviderId($providerUser->getId())
                    ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (! $user) {
                $ustring = Str::random(32);
                print $ustring;
                if ($provider === 'discord') {
                    $user = User::create([
                        'email' => $providerUser->getEmail(),
                        'name'  => $providerUser->getName(),
                        'avatar' => $providerUser->getAvatar(),
                        'discordUsername' => $providerUser->getNickname(),
                        'usaf_verification' => $ustring,
                        'usaf_verified' => false,
                    ]);
                } else {
                    $user = User::create([
                        'email' => $providerUser->getEmail(),
                        'name'  => $providerUser->getName(),
                        'avatar' => $providerUser->getAvatar(),
                        'usaf_verification' => $ustring,
                        'usaf_verified' => false,
                    ]);
                }
            }

            if ($provider === 'discord') {
                $user = User::whereEmail($providerUser->getEmail())->first();
                $user->discordUsername = $providerUser->getNickname();
                $user->save();
            }

            $user->identities()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
