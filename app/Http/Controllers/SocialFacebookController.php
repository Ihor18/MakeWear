<?php

namespace App\Http\Controllers;


use App\Models\WholesaleBuyer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            $name = explode(' ',$user->name);

            $current_user = User::where('email', $user->email)->first();



            if($current_user){
                Auth::login($current_user);
                return redirect()->route('home');
            }else{

                WholesaleBuyer::create([
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'email' => $user->email,
                    'fb_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                $user = WholesaleBuyer::latest()->first();
                $newUser = User::create([
                    'email' => $user->email,
                    'password' => encrypt('123456dummy'),
                    'user_id' => $user->id,
                    'user_type'=> 'wholesale_buyer',
                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }
        }

}
