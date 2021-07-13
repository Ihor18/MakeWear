<?php

namespace App\Http\Controllers;


use App\Models\RetailBuyer;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;



class SocialController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {


            $user = Socialite::driver('google')->stateless()->user();
            $name = explode(' ',$user->name);
        $current_user = User::where('email', $user->email)->first();


            if($current_user){
                Auth::login($current_user);
                return redirect('/');
            }else{

                RetailBuyer::create([
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
                $user = RetailBuyer::latest()->first();
                $newUser = User::create([
                    'email' => $user->email,
                    'password' => encrypt('123456dummy'),
                    'user_id' => $user->id,
                    'user_type'=> 'retail_buyer',
                ]);
                Auth::login($newUser);
                return redirect('/');
    }
}
}
