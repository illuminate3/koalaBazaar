<?php

namespace App\Http\Controllers\Dashboard;

use App\CheckOut;
use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Supplier;
use App\Customer;
use App\Product;
use App\PaymentInfo;



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
        if (Session::has('user_instagram_info')) {
            $userInfo = Session::get('user_instagram_info');
            return view('dashboard.supplierRegister', ['userInfo' => $userInfo]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('user_instagram_info')) {

            $rules = array(
                'firstname' => 'required',
                'surname' => 'required',
                'shopname' => 'required',
                'shopemail' => 'required|email',
                'pass' => 'required',
                'repass' => 'required|same:pass'
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

            } else {
                $instagramInfo = Session::pull('user_instagram_info');


                $user = new User();
                $user->name = $request->input('firstname');
                $user->surname = $request->input('surname');
                $user->setAsSupplier();
                $user->is_active = false;
                $user->email = $request->input('shopemail');
                $user->password = bcrypt($request->input('pass'));
                $user->save();

                $supplier = new Supplier();
                $supplier->id = $user->id;
                $supplier->shop_name = $request->input('shopname');
                $supplier->profile_image = $instagramInfo->user->profile_picture;
                $supplier->save();

                $instagramAccount = new InstagramAccount();
                $instagramAccount->instagram_id = $instagramInfo->user->id;
                $instagramAccount->username = $instagramInfo->user->username;
                $instagramAccount->access_token = $instagramInfo->access_token;
                $instagramAccount->full_name = $instagramInfo->user->full_name;
                $instagramAccount->bio = $instagramInfo->user->bio;
                $instagramAccount->website = $instagramInfo->user->website;
                $instagramAccount->profile_picture = $instagramInfo->user->profile_picture;
                $supplier->instagramAccount()->save($instagramAccount);
                Storage::makeDirectory($user->id);
                return redirect()->action('AuthenticationController@showRegister')->with('success', ['Successful']);

            }
        } else {
            return redirect()->action('AuthenticationController@showRegister');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $products = Product::where(['supplier_id' => $user->id])->orderBy('created_at','desc')->take(5)->get();
        //  $products= Product::where(['supplier_id'=>$user->id,'is_active'=>'1'])->get();
        $comments=DB::table('comments')->join('products',function($join){
            $join->on('comments.commentable_id','=','products.id')->where('products.supplier_id','=',Auth::user()->id)->where('comments.commentable_type','=','App\Product');

        })->select(DB::raw('comments.id as comment_id'))->orderBy('comments.created_at','desc')->take(5)->get();
        return view('dashboard.supplierHomePage', ['user' => $user, 'products' => $products,'comments'=>$comments]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('dashboard.supplierProfileEdit', ['user' => $user]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateRules = array(
            'firstname' => 'required',
            'surname' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'country' => 'required',
            'city' => 'required',
            'description' => 'required',
        );

        $validator = Validator::make($request->all(), $updateRules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $user = Auth::user();
            $user->name = $request->input('firstname');
            $user->surname = $request->input('surname');
            $user->email = $request->input('email');
            $user->update();

            $supplier = $user->userable;
            $supplier->cover_image = $request->input('cover_image');
            $supplier->country = $request->input('country');
            $supplier->city = $request->input('city');
            $supplier->description = $request->input('description');
            $supplier->phone = $request->input('phone');

            $supplier->update();
            return redirect()->back()->with('success', ['Profil bilgileriniz güncellendi']);
        }
    }

    public function updatePassword(Request $request)
    {
        $rules = array(
            'current_password' => 'required|alphaNum',
            'password' => 'required|alphaNum',
            'rpassword' => 'required|same:password'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);

        }


        $user = Auth::user();
        if (Hash::check($request->input('current_password'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
            return redirect()->back()->with('success', ['Parolanız güncellendi']);
        } else {
            return redirect()->back()->withErrors(['messages' => ['Mevcut parolanız doğrulanmamıştır']]);
        }


    }

    public function updateImages(Request $request)
    {
        $rules = array('cover_image' => 'required');
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);

        } else {

            $user = Auth::user();
            $supplier = $user->userable;
            $supplier->cover_image = $request->input('cover_image');
            $supplier->update();
            return redirect()->back()->with('success', ['Fotoğrafınız güncellendi']);

        }

    }

    public function showWaitingPayments() {
        $user=Auth::user();

        $checkouts=DB::table('check_outs')->select('payment_id',DB::raw('sum(product_price * count) as total'))->groupBy('payment_id')->where(['supplier_id'=>$user->id,'confirmed_by_supplier'=>0])->whereNotNull('payment_id')->orderBy('created_at','desc')->get();

        return view('dashboard.waitingPayments',['checkouts'=>$checkouts]);
    }

    public function waitingPaymentDetail($id)
    {
       // $payment=Payment::where('id',$id)->first();
        $payment = Payment::find($id);
        $checkOuts=CheckOut::where('supplier_id',Auth::user()->id)->where('payment_id',$id)->get();
        $sampleOut=CheckOut::where('supplier_id',Auth::user()->id)->where('payment_id',$id)->first();
        $customer=Customer::where('id',$sampleOut->customer_id)->first();
        $paymentInfo=PaymentInfo::where('id',$payment->payment_info_id)->first();
        return view('dashboard.waitingPaymentDetail',['customer'=>$customer,'checkOuts'=>$checkOuts,'payment'=>$payment,'paymentInfo'=>$paymentInfo]);
    }
    public function confirmPayment(Request $request,$id) {

        $payment = Payment::find($id);
        $payment->does_supplier_confirm=1;
        $payment->update();

        $checkouts=CheckOut::where(['supplier_id'=>Auth::user()->id,'payment_id'=>$id])->get();
        foreach($checkouts as $checkout) {
            $checkout->confirmed_by_supplier=1;
            $checkout->update();
        }

        return redirect()->action('Dashboard\SupplierController@showWaitingPayments')->with(['success'=>['Müşteri ödemesi onaylandı.']]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
