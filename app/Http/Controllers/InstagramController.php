<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\CustomClasses\InstagramAPI;

class InstagramController extends Controller
{
    public function subscriptioncallback(Request $request){
        if($request->has('hub_mode')){
            if($request->get('hub_mode')=='subscribe'){
                print $request->get('hub_challenge');
                exit(1);

            }
        }else{
            $objects=$request->json()->all();

            foreach($objects as $object){
                $product=new Product();
                $product->title=$object['object_id'];
                $product->save();
            }
        }




    }
    public function callback(Request $request){

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
                        $instagram=new InstagramAPI();
                        $data = $instagram->getOAuthToken($code);
                        Session::put('user_instagram_info',$data);
                        return Redirect::action('Dashboard\SupplierController@create');
                    }
                }

            }
        }
    }
}
