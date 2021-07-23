<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {

            $social_user = Socialite::driver($provider)->user();

        } catch (Exception $e) {

            return redirect('/');
        }

        $user = User::where('provider', $provider)
            ->where('provider_id', $social_user->getId())
            ->first();

        if (!$user) {

            $user = User::create([
                'name'        => $social_user->getName(),
                'email'       => $social_user->getEmail(),
                'provider'    => $provider,
                'provider_id' => $social_user->getId(),
            ]);

            $user->attachRole('user');

        }//end of if 

        Auth::login($user, true);

        return redirect()->intended('/');

    }//end of handle callback

}
