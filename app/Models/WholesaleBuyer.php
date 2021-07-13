<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholesaleBuyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'google_id','fb_id','remember_token'
    ];
 public function updateBuyer($request,$id){
     $buyer =  WholesaleBuyer::find( $id);

     $buyer->first_name = $request['first_name'];
     $buyer->last_name = $request['last_name'];
     $buyer->email = $request['email'];
     $buyer->save();
 }
}
