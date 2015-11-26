<?php

namespace App\Http\Controllers;

use App\Category;
use App\CurrencyUnit;
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
                                    $product->currency_unit_id = null;
                                }else{
                                    $text=mb_strtolower($caption, 'UTF-8');

                                    $units=CurrencyUnit::all();
                                    $estimatedPrice=null;
                                    $currencyUnit=null;
                                    foreach($units as $unit){
                                        $firstOccurence=stripos($text,$unit->unit_short_name);
                                        if($firstOccurence){
                                            for($i=$firstOccurence-1; $i>=0;$i--){
                                                $charAt=substr($text,$i,1);
                                                if(is_numeric($charAt) || $charAt=='.'){
                                                    $estimatedPrice=$charAt.$estimatedPrice;
                                                }else{
                                                    $i=0;
                                                }

                                            }
                                            $currencyUnit=$unit->id;
                                            break;
                                        }

                                    }

                                    if($estimatedPrice){
                                        $product->price=$estimatedPrice;
                                        $product->currency_unit_id = $currencyUnit;
                                    }else{
                                        $product->price=null;
                                        $product->currency_unit_id = null;
                                    }
                                }

                                if($product->price==null || $product->currency_unit_id==null){
                                    $product->is_active=false;
                                }else{
                                    $product->is_active=true;
                                }
                                $product->save();
                                foreach($singleMedia->tags as $tag){

                                    $relatedCategories=Category::where('keywords', 'LIKE', '%'.mb_strtolower($tag, 'UTF-8').'%')->get();
                                    foreach($relatedCategories as $relatedCategory){
                                        $product->categories()->attach($relatedCategory);
                                    }
                                }
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

                if($instagramOperation['user_type']=='customer'){
                    if (Session::has('user_instagram_info'))
                    {
                        Session::forget('user_instagram_info');
                    }
                    if($request->get('code')){
                        $code = $request->get('code');
                        $instagram=new InstagramAPI();
                        $data = $instagram->getOAuthToken($code);
                        Session::put('user_instagram_info',$data);
                        return Redirect::action('Dashboard\CustomerController@create');
                    }
                }

            }
        }
    }
}
