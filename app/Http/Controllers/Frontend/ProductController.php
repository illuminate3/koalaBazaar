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
                    $wishedProducts=WishedProduct::where('customer_id',$user->id)->get();
                    foreach($wishedProducts as $wishedProduct){
                        $productObject=Product::where('id',$wishedProduct->product_id)->first();
                        if(CheckOut::create([
                            'product_id'=>$productObject->id,
                            'customer_id'=>$user->id,
                            'description'=>$productObject->description,
                            'customer_email'=>$user->email,
                            'product_title'=>$productObject->title,
                            'product_price'=>$productObject->price,
                            'payment_id'=>null,
                            'image'=>$productObject->image,
                            'current_unit'=>$productObject->currency_unit_id,
                            'supplier_id'=>$productObject->supplier_id,

                            'receiver_address_id'=>$request->input('shipping_address'),
                            'bill_address_id'=>($request->has('billing_address')) ? $request->input('billing_address') : null ,
                        ])){
                            $wishedProduct->delete();
                        };


                    }
                }

    }

    public function showCheckOut(){
            $user=Auth::user();
                $products=DB::table('wished_products')
                    ->select('product_id', DB::raw('count(*) as order_number'))
                    ->groupBy('product_id')
                    ->where('customer_id',$user->id)
                    ->orderBy('created_at','desc')
                    ->get();
                $addresses=$user->userable->addresses;
                $units=CurrencyUnit::all();
                $cartTotal=null;
                foreach($units as $unit){
                    $cartTotal[$unit->unit_short_name]=0;
                }
                return view('user.checkout',['products'=>$products,'addresses'=>$addresses,'cartTotal'=>$cartTotal]);



    }

    public function showCart(){
            $user=Auth::user();
                $products=DB::table('wished_products')
                    ->select('product_id', DB::raw('count(*) as order_number'))
                    ->groupBy('product_id')
                    ->where('customer_id',$user->id)
                    ->orderBy('created_at','desc')
                    ->get();

    return view('user.cart',['products'=>$products]);
 }

    public function removeFromCart(Request $request,$id){

            $user=Auth::user();
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


    }
    public function addToCart(Request $request,$id){
        if($product=Product::where(['id'=>$id,'is_active'=>true])->first()){

                $user=Auth::user();
                    if($request->has('quantity')){
                        for($i=0; $i<$request->input('quantity');$i++){
                            WishedProduct::create(['customer_id'=>$user->id,'product_id'=>$product->id]);
                        }
                        return redirect()->back()->with(['success'=>['Ürün sepetinize eklendi.']]);
                    }else{
                        if(WishedProduct::create(['customer_id'=>$user->id,'product_id'=>$product->id])){
                            return redirect()->back()->with(['success'=>['Ürün sepetinize eklendi.']]);
                        }else{
                            return redirect()->back()->withErrors(['messages'=>['Ürün eklenemedi.']]);
                        }
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

            return view('user.product',['product'=>$product,'relatedProducts'=>$relatedProducts]);
        }else{
            return redirect()->action('Frontend\HomeController@index');
        }
    }

}
