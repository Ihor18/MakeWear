<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterProviderController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    protected function createUser($data,$user,$user_type){
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_id' => $user->id,
            'user_type'=> $user_type,
        ]);
    }
    public function showProviderForm()
    {
        return view('auth.register_provider');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'site' => ['required', 'url'],
            'category' =>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data){

        $resultCategory = (new Provider())->getCategory($data['category']);
        Provider::create([
            'company_name' => $data['companyName'],
            'site' => $data['site'],
            'clothes_category' => $resultCategory[0],
            'shoes_category' => $resultCategory[1],
            'accessories_category' => $resultCategory[2],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user = Provider::latest()->first();
        return $this->createUser($data,$user,'provider');
    }
}
