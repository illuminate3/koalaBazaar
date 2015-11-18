<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function doLogin(Request $request){

// validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'pass' => 'required|alphaNum' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect()->action('AuthenticationController@showRegister')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('pass')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => $request->input('email'),
                'password'  => $request->input('pass')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                $user=Auth::user();
                if($user->isSupplier()){

                    return redirect()->action('Dashboard\SupplierController@edit');
                }

            } else {

                // validation not successful, send back to form
                return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>'Email or Password is incorrect']);

            }

        }
    }



}
