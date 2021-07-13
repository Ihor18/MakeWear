<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\RetailBuyer;
use App\Models\User;
use App\Models\WholesaleBuyer;
use Illuminate\Http\Request;


class UsersController extends Controller
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

    protected function validator(){
        return [
            'first_name' => 'required|string|min:3|max:55',
            'last_name' => 'required|string|min:3|max:55',
            'email' => 'required|string|email',
        ];
    }
    protected function validatorProvider(){
        return [
            'company_name' =>'required|min:3|max:100',
            'site' => 'required|url',
            'category' =>'required',
            'email' => 'required|string|email',
        ];
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $first = Provider::all();
        $second = WholesaleBuyer::all();
        $third = RetailBuyer::all();
        return view('home',compact('first','second','third'));
    }
    public function edit($id,$type){
    if($type=='provider'){
        $provider = (new Provider())->where('id',$id)->first();
        return view('provider_edit',compact('provider'));
    }elseif($type=='wholesale_buyer'){
        $buyer = (new WholesaleBuyer())->find($id);
        return view('buyer_edit',compact('buyer','type'));
    }else{
        $buyer = (new RetailBuyer())->find($id);
        return view('buyer_edit',compact('buyer','type'));
    }
    }

    public function update(Request $request,$id,$type){
        if($type=='provider') {
            $request = $request->validate($this->validatorProvider());
            (new User())->updateUser($type,$request['email'],$id);
            (new Provider())->updateProvider($request,$id);
        }elseif($type=='wholesale_buyer'){
            $request = $request->validate($this->validator());
            (new User())->updateUser($type,$request['email'],$id);
            (new WholesaleBuyer())->updateBuyer($request,$id);
        }else{
            $request = $request->validate($this->validator());
            (new User())->updateUser($type,$request['email'],$id);
            (new RetailBuyer())->updateBuyer($request,$id);
        }
        return redirect()->route("home");
    }

    public function delete($id,$type){
        if($type=='provider') {
            (new User())->deleteUser($type,$id);
        Provider::find($id)->delete();
        }elseif($type=='wholesale_buyer'){
            (new User())->deleteUser($type,$id);
            WholesaleBuyer::find($id)->delete();
        }else{
            (new User())->deleteUser($type,$id);
            RetailBuyer::find($id)->delete();
        }
        return redirect()->route('home');
    }

}
