<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Facades\Instagram;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function showRegister(){
        return view('user.register');
    }

    public function registersupplierviainstagram(){
        Session::put('instagram_operation',['operation'=>'register','user_type'=>'supplier']);
        return Redirect::to(Instagram::getLoginUrl());
    }

    public function showSupplierRegister(){
        if(Session::has('user_instagram_info')){
            $userInfo=Session::get('user_instagram_info');
            return view('dashboard.supplierRegister',['userInfo'=>$userInfo]);
        }

    }

    public function instagramCallback(Request $request){
        if(Session::get('instagram_operation')){
            $instagramOperation=Session::pull('instagram_operation');
           if($instagramOperation['operation']=='register'){
               if($instagramOperation['user_type']=='supplier'){
                   if (Session::has('user_instagram_info'))
                   {
                       Session::forget('user_instagram_info');
                   }

                   if($request->get('code')){
                       $code = $request->get('code');
                       $data = Instagram::getOAuthToken($code);
                       Session::put('user_instagram_info',$data);
                       return Redirect::action('AuthenticationController@showSupplierRegister');
                   }
               }

           }
        }

    }
}
