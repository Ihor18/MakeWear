<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name','site','clothes_category','shoes_category','accessories_category','email', 'password',
    ];

    public function getCategory($data){
        $category = ['clothes','shoes','accessories'];
        $resultCategory = [0,0,0];
        foreach ($category as $key=>$value){
            if(in_array($value,$data)){
                $resultCategory[$key]=1;
            }
        }
        return $resultCategory;
    }

    public function updateProvider($request,$id){
        $provider =  Provider::find( $id);
        $resultCategory = (new Provider())->getCategory($request['category']);
        $provider->company_name = $request['company_name'];
        $provider->site = $request['site'];
        $provider->clothes_category = $resultCategory[0];
        $provider->shoes_category = $resultCategory[1];
        $provider->accessories_category= $resultCategory[2];
        $provider->email = $request['email'];
        $provider->save();
    }
}
