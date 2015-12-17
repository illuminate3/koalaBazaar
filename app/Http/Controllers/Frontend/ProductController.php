<?php

namespace App\Http\Controllers\Frontend;

use App\CheckOut;
use App\Comment;
use App\CurrencyUnit;
use App\Product;
use App\Ranking;
use App\WishedProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    }

    public function addReview(Request $request,$id){
            $user=Auth::user();
                $validator = Validator::make([
                    'comment_body'=>$request->input('comment_body'),
                    'ranking'=>$request->input('ranking'),
                    'product_id'=>$id
                ], [
                    'ranking'=>'integer|min:1|max:5',
                    'product_id' => 'integer|exists:products,id',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }else{
                    $product=Product::where('id',$id)->first();
                    if($request->has('comment_body')){
                        $comment=new Comment();
                        $comment->comment_body=$request->input('comment_body');
                        $comment->is_confirmed=true;
                        $comment->user_id=$user->id;
                        $product->comments()->save($comment);
                    }

                    if($request->has('ranking')){
                        if(!$product->rankings()->where('user_id',$user->id)->first()){
                            $ranking=new Ranking();
                            $ranking->vote=$request->input('ranking');
                            $ranking->is_confirmed=true;
                            $ranking->user_id=$user->id;
                            $product->rankings()->save($ranking);
                        }

                    }




                    return redirect()->back()->with(['success'=>['Yorumunuz kaydedildi']]);
                }

    }

    public function proceedCheckOut(Request $request){
            $user=Auth::user();
                $validator = Validator::make($request->all(), [
                    'billing_address' => 'integer|exists:addresses,id',
                    'shipping_address' => 'required|integer|exists:addresses,id',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }else{
                    $wishedProducts=$user->userable->wishedProducts;
                    if(count($wishedProducts)>0){
                        foreach($wishedProducts as $wishedProduct){
                            if(CheckOut::create([
                                'product_id'=>$wishedProduct->product->id,
                                'customer_id'=>$user->id,
                                'description'=>$wishedProduct->product->description,
                                'customer_email'=>$user->email,
                                'product_title'=>$wishedProduct->product->title,
                                'product_price'=>$wishedProduct->product->price,
                                'payment_id'=>null,
                                'image'=>$wishedProduct->product->image,
                                'current_unit'=>$wishedProduct->product->currency_unit_id,
                                'supplier_id'=>$wishedProduct->product->supplier_id,
                                'count'=>$wishedProduct->count,
                                'receiver_address_id'=>$request->input('shipping_address'),
                                'bill_address_id'=>($request->has('billing_address')) ? $request->input('billing_address') : null ,
                            ])){
                                $wishedProduct->delete();
                            };
                        }

                        return redirect()->action('Dashboard\CustomerController@showUnpaidOrders');
                    }else{

                        return redirect()->back()->withErrors(['messages'=>['Lütfen sepetinize ürün ekleyiniz']]);
                    }




                }

    }

    public function showCheckOut(){
            $user=Auth::user();
                $products=$user->userable->wishedProducts;
                if(count($products)>0){

                    $addresses=$user->userable->addresses;
                    return view('user.checkout',['products'=>$products,'addresses'=>$addresses]);
                }else{
                    return redirect()->back()->withErrors(['messages'=>['Sepetinize ürün eklemelisiniz']]);
                }



    }

    public function showCart(){
            $user=Auth::user();
            $products=$user->userable->wishedProducts;

    return view('user.cart',['products'=>$products]);
 }

    public function removeFromCart(Request $request,$id){

            $user=Auth::user();
                $quantity=1;
                if($request->has('quantity')){
                    if($request->input('quantity')>1){
                        $quantity=$request->input('quantity');
                    }

                }
                if($wishedProducts=WishedProduct::where(['product_id'=>$id,'customer_id'=>$user->id])->first()){
                    if($wishedProducts->count==1){
                        $wishedProducts->delete();
                    }else{
                        $wishedProducts->count-=$quantity;
                        $wishedProducts->update();
                    }
                    return redirect()->back()->with(['success'=>['Ürün sepetinizden kaldırıldı.']]);
                }else{
                    return redirect()->back()->withErrors(['messages'=>['Ürün zaten sepetinizden kaldırılmış']]);
                }


    }
    public function addToCart(Request $request,$id){
        if($product=Product::where(['id'=>$id,'is_active'=>true])->first()){

                $user=Auth::user();
            $quantity=1;
                    if($request->has('quantity')){
                        if($request->input('quantity')>1){
                            $quantity=$request->input('quantity');
                        }
                    }
            if($productInWished=WishedProduct::where(['product_id'=>$id,'customer_id'=>$user->id])->first()){
                $productInWished->count+=$quantity;

                $productInWished->update();
            }else{
                WishedProduct::create(['product_id'=>$id,'customer_id'=>$user->id,'count'=>$quantity]);
            }
            return redirect()->back()->with(['success'=>['Ürün sepetinize eklendi']]);


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

            return view('user.product',['product'=>$product,'relatedProducts'=>$relatedProducts]);
        }else{
            return redirect()->action('Frontend\HomeController@index');
        }
    }

}
