<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Supplier;
use App\InstagramAccount;
class SupplierController extends Controller
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
            return view('dashboard.supplierRegister',['userInfo'=>$userInfo]);
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
        if(Session::has('user_instagram_info')){

            $rules = array(
                'firstname'        => 'required',
                'surname'          =>'required',
                'shopname'         =>'required',
                'shopemail'        => 'required|email',
                'pass'             =>'required',
                'repass'           => 'required|same:pass'
            );

            // do the validation ----------------------------------
            // validate against the inputs from our form
            $validator = Validator::make($request->all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                // get the error messages from the validator
                $messages = $validator->messages();
                // redirect our user back to the form with the errors from the validator
                return back()->withInput()->withErrors($messages);

            }else{
                $instagramInfo=Session::pull('user_instagram_info');


                $user=new User();
                $user->name=$request->input('firstname');
                $user->surname=$request->input('surname');
                $user->setAsSupplier();
                $user->is_active=false;
                $user->email=$request->input('shopemail');
                $user->password=bcrypt($request->input('pass'));
                $user->save();

                $supplier=new Supplier();
                $supplier->id=$user->id;
                $supplier->shop_name=$request->input('shopname');
                $supplier->profile_image=$instagramInfo->user->profile_picture;
                $supplier->save();

                $instagramAccount=new InstagramAccount();
                $instagramAccount->instagram_id=$instagramInfo->user->id;
                $instagramAccount->username=$instagramInfo->user->username;
                $instagramAccount->access_token=$instagramInfo->access_token;
                $instagramAccount->full_name=$instagramInfo->user->full_name;
                $instagramAccount->bio=$instagramInfo->user->bio;
                $instagramAccount->website=$instagramInfo->user->website;
                $instagramAccount->profile_picture=$instagramInfo->user->profile_picture;
                $supplier->instagramAccount()->save($instagramAccount);

                redirect()->action('AuthenticationController@showRegister')->with('success',['Successful']);

            }
        }else{
            return redirect()->action('AuthenticationController@showRegister');
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
        return view('dashboard.testWelcome');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=Auth::user();

        return view('dashboard.supplierProfileEdit',['user'=>$user]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateRules = array(

            'firstname'           => 'required',
            'surname'        => 'required',
            'phone'         => 'required| digits:11',
            'email'       => 'required|email',
            'country'        => 'required',
            'city'           => 'required',
            'description'    => 'required',
        );
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $updateRules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $updater = $validator->messages();
            // redirect our user back to the form with the errors from the validator

            return back()->withInput()->withErrors($validator,'updater');

        }
        else {
        $user=Auth::user();


            $user->name=$request->input('firstname');
            $user->surname=$request->input('surname');
            $user->email=$request->input('email');
            $user->password=bcrypt($request->input('password'));
            $user->update();

            $supplier=$user->userable;
            $supplier->profile_image=$request->input('profile_picture');
            $supplier->cover_image=$request->input('cover_image');
            $supplier->country=$request->input('country');
            $supplier->city=$request->input('city');
            $supplier->description=$request->input('description');
            $supplier->phone=$request->input('phone');

            $supplier->update();
            return redirect()->back()->with('success',['Successful','asdas']);

        }
    }
    public function updatePassword(Request $request)
    {

            $rules = array(
                'password'             =>'required',
            'repassword'           => 'required|same:password'
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator2 = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator2->fails()) {
            // get the error messages from the validator
            $updatePassword = $validator2->messages();
            // redirect our user back to the form with the errors from the validator
            return back()->withInput()->withErrors($validator2,'updatePassword');

        }else{
            $user=Auth::user();
            $user->password=bcrypt($request->input('password'));
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
