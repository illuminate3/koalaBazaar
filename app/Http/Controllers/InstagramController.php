<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductsInstagram;
use App\User;
use App\FileEntry;
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
                $instagramAccount=InstagramAccount::where('instagram_id',$object['object_id'])->first();
                if($instagramAccount->isSupplier()){
                    $instagram->setAccessToken($instagramAccount->access_token);
                    $media=$instagram->getUserMedia($instagramAccount->instagram_id,1);
                    if($media->meta->code==200){
                        foreach($media->data as $singleMedia) {
                            if ($singleMedia->type == 'image' && ProductsInstagram::where('id', '=', $singleMedia->id)->first() ==null) {

                                $caption=null;
                                if(isset($singleMedia->caption)){
                                    $caption=$singleMedia->caption->text;
                                }

                                $product = new Product();
                                $product->supplier_id = $instagramAccount->instagramable->id;
                                $product->title = $instagramAccount->instagramable->shop_name.' '.$caption;
                                $product->description = $caption;
                                $file = new FileEntry();
                                $status=$file->storeFromUrl($singleMedia->images->standard_resolution->url,$instagramAccount->instagramable->id,'product');
                                if($status){
                                    $product->image = $file->filename;
                                }else{
                                    $product->image =null;
                                };


                                if($caption==null){
                                    $product->price=null;
                                    $product->current_unit = null;
                                    $product->is_active = false;
                                }else{
                                    $product->price =1223;
                                    $product->is_active = true;
                                    $product->current_unit = 'try';
                                }
                                $product->price = ($caption==null) ? null : $caption;
                                $product->save();

                                $productInstagram = new ProductsInstagram();
                                $productInstagram->product_id = $product->id;
                                $productInstagram->url = $singleMedia->link;
                                $productInstagram->id=$singleMedia->id;
                                $productInstagram->image_url = $singleMedia->images->standard_resolution->url;
                                $productInstagram->caption = $caption;
                                $productInstagram->created_on_instagram = date('Y-m-d h:i:sa', $singleMedia->created_time);
                                $productInstagram->save();
                            }
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
