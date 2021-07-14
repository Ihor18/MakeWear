<?php

namespace App\Http\Controllers;


use App\Models\Provider;
use App\Models\WholesaleBuyer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {

        $user = Socialite::driver('facebook')->stateless()->user();
        $name = explode(' ', $user->name);

        $current_user = User::where('email', $user->email)->first();

        $provider = Provider::where('email', $user->email)->first();
        if (!$provider) {

            if ($current_user) {
                Auth::login($current_user);
                return redirect()->route('home');
            } else {

                WholesaleBuyer::create([
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                $user = WholesaleBuyer::latest()->first();
                $newUser = User::create([
                    'email' => $user->email,
                    'password' => encrypt('123456dummy'),
                    'user_id' => $user->id,
                    'user_type' => 'wholesale_buyer',
                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }
        }else{
            return Redirect()->route('login')->withErrors(['На этот емейл зарегестрирован поставщик!']);
        }
    }

}
