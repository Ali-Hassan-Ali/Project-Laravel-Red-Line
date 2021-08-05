<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{

    public function redirectToProvider($provider)
    {
        
        return Socialite::driver($provider)->redirect();

    }//end fo redirectToProvider function

    public function handleProviderCallback($provider)
    {
        try {

            $social_user = Socialite::driver($provider)->user();

            if ($social_user->getEmail() == null) {

                return redirect('/');

            }

        } catch (Exception $e) {

            return redirect('/');

        }//end of try catch


        $user = User::where('provider', $provider)
            ->where('provider_id', $social_user->getId())
            // ->where('provider','!=',$provider)
            ->first();

        if (!$user) {

            $user = User::create([
                'name'        => $social_user->getName(),
                'email'       => $social_user->getEmail(),
                'image'       => $social_user->getAvatar(),
                'provider'    => $provider,
                'password'    => bcrypt('123'),
                'provider_id' => $social_user->getId(),
            ]);

            Auth::login($user, true);

        }//end of if 


        $login = auth()->guard('users')->attempt(
        [
            'email'    => $social_user->getEmail(),
            'password' => '123',
        ]);//end of attempt


        return redirect()->intended('/');

    }//end of handle callback

}//end of controller
