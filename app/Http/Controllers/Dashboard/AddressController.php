<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\User;
use App\Address;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();

        $addresses= Address::where(['customer_id'=>$user->id])->get();

        return view('dashboard.customer.addressList',['addresses'=>$addresses]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // return null;


        return view('dashboard.customer.createAddress');
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
        $addressRules = array(
            'address_name' => 'required',
            'name'      => 'required',
            'surname'        => 'required',
            'phone_number'          => 'required|digits:11',
            'city'          => 'required',
            'country'        => 'required',
            'distinct'        => 'required',
            'zip_code'           => 'required',
            'address_detail'    => 'required',
        );

        $validator = Validator::make($request->all(), $addressRules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        else {
            $user=Auth::user();
            $address=new Address();
            $address->customer_id=$user->id;
            $address->address_name=$request->input('address_name');
            $address->name=$request->input('name');
            $address->surname=$request->input('surname');
            $address->phone_number=$request->input('phone_number');
            $address->distinct=$request->input('distinct');
            $address->city=$request->input('city');
            $address->country=$request->input('country');
            $address->address_detail=$request->input('address_detail');
            $address->zip_code=$request->input('zip_code');



            $address->save();
            return redirect()->back()->with('success',['Successful'=>'Adresiniz eklendi']);
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
        if(!Address::find($id)) {
            return redirect()->back()->withErrors(['messages'=>"adres bulunamadı"]);
        }
        $address=Address::find($id);
        if(Auth::user()->id!=$address->customer_id) {
            return redirect()->back()->withErrors(['messages'=>"adres size ait değil"]);
        }

        return view('dashboard.customer.editAddress',['address'=>$address]);
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
        if(!Address::find($id)) {
            // return view('dashboard.supplierProfileEdit');
            return redirect()->back()->withErrors(['messages'=>"adres bulunamadı"]);
        }
        $address=Address::find($id);
        if(Auth::user()->id!=$address->customer_id) {
            //return view('dashboard.supplierProfileEdit');
            return redirect()->back()->withErrors(['messages'=>"adres size ait değil"]);
        }
        $addressRules = array(
            'address_name' => 'required',
            'name'      => 'required',
            'surname'        => 'required',
            'phone_number'          => 'required|digits:11',
            'city'          => 'required',
            'country'        => 'required',
            'distinct'        => 'required',
            'zip_code'           => 'required',
            'address_detail'    => 'required',
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $addressRules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $updateProduct = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            // return view('dashboard.supplierProfileEdit');
            return back()->withInput()->withErrors($validator);

        }else{

            $user=Auth::user();

            $address->customer_id=$user->id;
            $address->address_name=$request->input('address_name');
            $address->name=$request->input('name');
            $address->surname=$request->input('surname');
            $address->phone_number=$request->input('phone_number');
            $address->distinct=$request->input('distinct');
            $address->city=$request->input('city');
            $address->country=$request->input('country');
            $address->address_detail=$request->input('address_detail');
            $address->zip_code=$request->input('zip_code');

            $address->update();
            return redirect()->back()->with('success',['Successful','Adres bilgileri güncellendi']);
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
