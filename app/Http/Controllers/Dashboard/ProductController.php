<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $shop=$user->userable;
        $products= Product::where(['supplier_id'=>$user->id])->get();
    //  $products= Product::where(['supplier_id'=>$user->id,'is_active'=>'1'])->get();

        return view('dashboard.productList',['products'=>$products]);


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Product::find($id)) {
            return redirect()->back()->withErrors(['messages'=>"ürün bulunamadı"]);
        }

        $product=Product::find($id)->first();
        if(Auth::user()->id!=$product->supplier_id) {
            return redirect()->back()->withErrors(['messages'=>"ürün size ait değil"]);
        }
    }
    public function setAsActive($id)
    {
      //  $product=Product::find($id)->first();
        if(!Product::find($id)) {
            return redirect()->back()->withErrors(['messages'=>"ürün bulunamadı"]);
        }

        $product=Product::find($id)->first();
        if(Auth::user()->id!=$product->supplier_id) {
            return redirect()->back()->withErrors(['messages'=>"ürün size ait değil"]);
        }

        $product->is_active=true;
        $product->update();
        return  redirect()->back()->with(['success'=>["Aktive edildi"]]);


    }

    public function setAsDeactive($id)
    {

        if(!Product::find($id)) {
            return redirect()->back()->withErrors(['messages'=>"ürün bulunamadı"]);
        }
        $product=Product::find($id)->first();
        if(Auth::user()->id!=$product->supplier_id) {
            return redirect()->back()->withErrors(['messages'=>"ürün size ait değil"]);
        }

        $product->is_active=false;
        $product->update();
        return  redirect()->back()->with(['success'=>["Deaktive edildi"]]);
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
