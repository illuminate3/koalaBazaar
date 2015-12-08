<?php

namespace App\Http\Controllers\Dashboard;

use App\PaymentInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Supplier;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();

        $paymentInfos= PaymentInfo::where(['supplier_id'=>$user->id])->get();

        return view('dashboard.paymentInfoList',['paymentInfos'=>$paymentInfos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createPaymentInfo');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $paymentInfoRules = array(
            'title' => 'required',
            'detail'      => 'required',
        );

        $validator = Validator::make($request->all(), $paymentInfoRules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        else {
            $user=Auth::user();
            $paymentInfo=new PaymentInfo();
            $paymentInfo->supplier_id=$user->id;
            $paymentInfo->title=$request->input('title');
            $paymentInfo->detail=$request->input('detail');


            $paymentInfo->save();
            return redirect()->back()->with('success',['Successful'=>'Ödeme Bilginiz eklendi']);
        }
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
        if(!PaymentInfo::find($id)) {
            return redirect()->back()->withErrors(['messages'=>"Ödeme bilgisi bulunamadı"]);
        }
        $paymentInfo=PaymentInfo::find($id);
        if(Auth::user()->id!=$paymentInfo->supplier_id) {
            return redirect()->back()->withErrors(['messages'=>"ödeme bilgisi size ait değil"]);
        }

        return view('dashboard.editPaymentInfo',['paymentInfo'=>$paymentInfo]);
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
        if(!PaymentInfo::find($id)) {
            // return view('dashboard.supplierProfileEdit');
            return redirect()->back()->withErrors(['messages'=>"Ödeme bilgisi bulunamadı"]);
        }
        $paymentInfo=PaymentInfo::find($id);
        if(Auth::user()->id!=$paymentInfo->supplier_id) {
            //return view('dashboard.supplierProfileEdit');
            return redirect()->back()->withErrors(['messages'=>"Ödeme bilgisi size ait değil"]);
        }
        $paymentInfoRules = array(
            'title' => 'required',
            'detail'      => 'required',

        );
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $paymentInfoRules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $updateProduct = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            // return view('dashboard.supplierProfileEdit');
            return back()->withInput()->withErrors($validator);

        }else{

            $user=Auth::user();

            $paymentInfo->supplier_id=$user->id;
            $paymentInfo->title=$request->input('title');
            $paymentInfo->detail=$request->input('detail');

            $paymentInfo->update();
            return redirect()->back()->with('success',['Successful','Ödeme bilgileriniz güncellendi']);
        }
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
