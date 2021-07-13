<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\RetailBuyer;
use App\Models\WholesaleBuyer;
use App\Models\Provider;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:55'],
            'lastName' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }




    protected function createUser($data,$user,$user_type){
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_id' => $user->id,
            'user_type'=> $user_type,
        ]);
    }


    protected function create(array $data)
    {

        if ($data['Buyer'] == 'Wholesale') {

             WholesaleBuyer::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user = WholesaleBuyer::latest()->first();
            return $this->createUser($data,$user,'wholesale_buyer');
        } else {
            RetailBuyer::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user = RetailBuyer::latest()->first();
            return $this->createUser($data,$user,'retail_buyer');
        }

    }
}
