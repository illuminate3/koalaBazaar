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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request,$slug=null)
    {

        $paginateNumber=5;
        if($slug==null) {
            $paginator=Product::where('is_active',true)->orderBy('created_at','desc')->paginate($paginateNumber);
            $recentlyAddedProducts=Product::where('is_active',true)->orderBy('created_at','desc')->limit(3);
        }elseif($category=Category::where('slug',$slug)->first()) {
            $recentlyAddedProducts=$category->products()->where('is_active',true)->orderBy('created_at','desc')->limit(3);
            $paginator=$category->products()->where('is_active',true)->orderBy('created_at','desc')->paginate($paginateNumber);
        }else{

            return redirect()->action('Frontend\HomeController@index');

        }
            $category=Category::where('slug',$slug)->first();

            $paginator->appends($request->except('page'));
            return view('user.category',['category'=>$category,'paginator'=>$paginator,'recentlyAddedProducts'=>$recentlyAddedProducts]);

    }

    public function showShopProfile($id,Request $request)
    {
        $supplier=Supplier::where('id',$id)->first();
        if($supplier){
            $products=$supplier->products()->paginate(1);
            dd($products->appends($request->except('page')));
        }else{
            return redirect()->action('Frontend\HomeController@index');
        }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
