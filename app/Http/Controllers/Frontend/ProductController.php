<?php

namespace App\Http\Controllers\Frontend;

use App\Product;
use App\WishedProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showCart(){

        $products=DB::table('wished_products')
            ->select('product_id', DB::raw('count(*) as order_number'))
            ->groupBy('product_id')
            ->where('customer_id','2')
            ->orderBy('created_at','desc')
            ->get();

        return view('user.cart',['products'=>$products]);
    }

    public function removeFromCart(Request $request,$id){
        if(Auth::check()){
            $user=Auth::user();
            if($user->isCustomer()){
                $quantity=0;
                if($request->has('quantity')){
                    $quantity=$request->input('quantity');
                }
                if($wishedProducts=WishedProduct::where(['product_id'=>$id,'customer_id'=>$user->id])->get()){
                    if($quantity==0){
                        $quantity=count($wishedProducts);

                    }
                    for($i=0 ; $i<$quantity ; $i++){
                       $wishedProducts[$i]->delete();

                    }
                    return redirect()->back()->with(['success'=>['Ürün sepetinizden kaldırıldı.']]);
                }else{
                    return redirect()->back()->withErrors(['messages'=>['Ürün zaten sepetinizden kaldırılmış']]);
                }

            }else{
                return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Satıcı olarak ürün sepetinizden çıkaramazsınız.','Lütfen müşteri olarak giriş yapınız.']]);

            }
        }else{
            return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Giriş yapmalısınız']]);
        }
    }
    public function addToCart($id){
        if($product=Product::where(['id'=>$id,'is_active'=>true])->first()){
            if(Auth::check()){
                $user=Auth::user();
                if($user->isCustomer()){
                    if(WishedProduct::create(['customer_id'=>$user->id,'product_id'=>$product->id])){
                        return redirect()->back()->with(['success'=>['Ürün sepetinize eklendi.']]);
                    }else{
                        return redirect()->back()->withErrors(['messages'=>['Ürün eklenemedi.']]);
                    }

                }else{
                    return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Satıcı olarak ürün alamazsınız.','Lütfen müşteri olarak giriş yapınız.']]);

                }
            }else{
                return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>['Giriş yapmalısınız']]);
            }
        }else{
            return redirect()->back()->withErrors(['messages'=>['Ürün bulunamadı.']]);
        }
    }

    public function show($id)
    {
        if($product=Product::where('id',$id)->first()){
            $relatedProducts=[];
            foreach($product->categories as $category){
                if(count($relatedProducts)>5){
                    break;
                }else{
                    foreach($category->products()->limit(5)->get() as $productOfCategory){
                        if($productOfCategory->id!=$id){

                            $relatedProducts[]=$productOfCategory;
                        }
                    }
                }
            }
           // dd($relatedProducts);
            return view('user.product',['product'=>$product,'relatedProducts'=>$relatedProducts]);
        }else{
            return redirect()->action('Frontend\HomeController@index');
        }
    }

}
