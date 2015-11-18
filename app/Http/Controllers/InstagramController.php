<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\InstagramAccount;
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
                $instagram=new InstagramAPI();
                $instagramAccount=InstagramAccount::where('instagram_id',2237148792)->first();
                if($instagramAccount->isSupplier()){
                    $instagram->setAccessToken($instagramAccount->access_token);
                    $media=$instagram->getUserMedia($instagramAccount->instagram_id);
                    if($media->meta->code==200){
                        foreach($media->data as $singleMedia){
                            $product=new Product();
                            $product->supplier_id=$instagramAccount->instagramable->id;
                            $product->title=$singleMedia->caption;
                            $product->description=$singleMedia->caption;
                            $product->is_active=true;
                            $product->image=$singleMedia->images->standard_resolution->url;
                            $product->current_unit='try';
                            $product->price=12;
                            $product->save();
                        }
                    }
                }
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
