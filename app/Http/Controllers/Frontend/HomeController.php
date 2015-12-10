<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('user.index');
        //
    }


    public function category(Request $request,$slug=null)
    {

        $paginateNumber=6 ;
        if($slug==null) {
            $products=Product::where('is_active',true);
        }elseif($category=Category::where('slug',$slug)->first()) {
            $products=$category->products()->where('is_active',true);
        }else{

            return redirect()->action('Frontend\HomeController@index');

        }
            $category=Category::where('slug',$slug)->first();
            $recentlyAddedProducts=$products->orderBy('created_at','desc')->limit(3)->get();
            $paginator=$products->orderBy('created_at','desc')->paginate($paginateNumber);
            $paginator->appends($request->except('page'));
            return view('user.category',['category'=>$category,'paginator'=>$paginator,'recentlyAddedProducts'=>$recentlyAddedProducts]);

    }

    public function shopList(Request $request)
    {
        $paginator=Supplier::paginate(10);
        $paginator->appends($request->except('page'));
        return view('user.shopsList',['paginator'=>$paginator]);
    }

    public function shopDetail(Request $request,$id){
        if($supplier=Supplier::where('id',$id)->first()){
            $paginateNumber=10;
            $products=$supplier->products();
            $paginator=$products->orderBy('created_at','desc')->paginate($paginateNumber);
            $paginator->appends($request->except('page'));
            $recentlyAddedProducts=$products->orderBy('created_at','desc')->limit(3)->get();
            return view('user.shop',['supplier'=>$supplier,'paginator'=>$paginator,'recentlyAddedProducts'=>$recentlyAddedProducts]);
        }else{
            return redirect()->action('Frontend\HomeController@index');
        }

    }

}
