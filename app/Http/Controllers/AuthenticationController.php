<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\CustomClasses\InstagramAPI;
class AuthenticationController extends Controller
{
    public function showRegister(){
        return view('user.register');
    }

    public function registersupplierviainstagram(){
        Session::put('instagram_operation',['operation'=>'register','user_type'=>'supplier']);
        $instagram=new InstagramAPI();
        return Redirect::to($instagram->getLoginUrl());
    }


}
