<?php

namespace App\Http\Controllers\Dashboard;

use App\Customer;
use App\User;
use App\Address;
use App\InstagramAccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
        if(Session::has('user_instagram_info')){
            $userInfo=Session::get('user_instagram_info');
            return view('dashboard.customerRegister',['userInfo'=>$userInfo]);
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

        $rules = array(
            'firstname'        => 'required',
            'surname'          =>'required',
            'customeremail'    => 'required|email',
            'pass'             =>'required',
            'phone'            =>'required',
            'rpass'            => 'required|same:pass'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return back()->withInput()->withErrors($messages);

        }else{
            if(User::where('email',$request->input('customeremail'))->first()){
                return redirect()->action('AuthenticationController@showRegister')->withErrors(['messages'=>"Sistemde mail adresi kayıtlı"]);
            }

            $user=new User();
            $user->name=trim($request->input('firstname'));
            $user->surname=trim($request->input('surname'));
            $user->setAsCustomer();
            $user->is_active=false;
            $user->email=$request->input('customeremail');
            $user->password=bcrypt($request->input('pass'));
            $user->save();
            $customer=new Customer();
            $customer->phone=$request->input('phone');
            $customer->id=$user->id;
            $customer->save();

            if(Session::has('user_instagram_info')) {
                $instagramInfo=Session::pull('user_instagram_info');

                $instagramAccount=new InstagramAccount();
                $instagramAccount->instagram_id=$instagramInfo->user->id;
                $instagramAccount->username=$instagramInfo->user->username;
                $instagramAccount->access_token=$instagramInfo->access_token;
                $instagramAccount->full_name=$instagramInfo->user->full_name;
                $instagramAccount->bio=$instagramInfo->user->bio;
                $instagramAccount->website=$instagramInfo->user->website;
                $instagramAccount->profile_picture=$instagramInfo->user->profile_picture;
                $customer->instagramAccount()->save($instagramAccount);
               }
            Storage::makeDirectory($user->id);


            return redirect()->action('AuthenticationController@showRegister')->with('success',['Successful']);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=Auth::user();

         $addresses= Address::where(['customer_id'=>$user->id])->get();
        //  $products= Product::where(['supplier_id'=>$user->id,'is_active'=>'1'])->get();

        return view('dashboard.customer.homePage',['user'=>$user,'addresses'=>$addresses]);
    //    return view('dashboard.customer.homePage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();

        return view('dashboard.customer.ProfileEdit',['user'=>$user]);
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
