<?php

namespace App\Http\Controllers\Dashboard;

use App\CheckOut;
use App\Customer;
use App\Payment;
use App\PaymentInfo;
use App\User;
use App\Supplier;
use App\Address;
use App\InstagramAccount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    public function edit()
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
    public function update(Request $request)
    {
        $updateRules = array(
            'firstname'      => 'required',
            'surname'        => 'required',
            'phone'          => 'required|digits:11',
            'email'          => 'required|email',
        );

        $validator = Validator::make($request->all(), $updateRules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        else {
            $user=Auth::user();
            $user->name=$request->input('firstname');
            $user->surname=$request->input('surname');
            $user->email=$request->input('email');
            $user->update();

            $customer=$user->userable;

            $customer->phone=$request->input('phone');

            $customer->update();
            return redirect()->back()->with('success',['Profil bilgileriniz güncellendi']);
        }
    }
    public function showUnpaidOrders() {
        $user=Auth::user();

        $checkouts=DB::table('check_outs')->select('supplier_id',DB::raw('sum(product_price * count) as total'))->groupBy('supplier_id')->where(['customer_id'=>$user->id,'payment_id'=>null])->orderBy('created_at','desc')->get();
       // dd($checkouts);

        return view('dashboard.customer.waitingOrders',['checkouts'=>$checkouts]);
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

    public function showOrderDetail($id)
    {
        $user=Auth::user();
        $supplier=Supplier::where(['id'=>$id])->first();
        $orders = $user->userable->checkOuts()->where(['supplier_id'=>$id,'payment_id'=>null])->get();
        $paymentInfos=PaymentInfo::where(['supplier_id'=>$id])->get();

        return view('dashboard.customer.orderDetail',['orders'=>$orders,'supplier'=>$supplier,'paymentInfos'=>$paymentInfos]);
    }
    public function showOrderHistory()
    {

        $user=Auth::user();
        $checkOuts=CheckOut::where('customer_id',$user->id)->whereNotNull('payment_id')->get();
        //dd($checkOuts);
        return view('dashboard.customer.orderHistory',['checkouts'=>$checkOuts]);
    }

    public function submitPayment(Request $request) {
        $validator=Validator::make($request->all(),[

            'payment_option'=>'required|integer|exists:payment_infos,id'
        ]);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return back()->withInput()->withErrors($messages);

        }else{
            $payment=new Payment();
            $payment->text=$request->input('note');
            $payment->payment_info_id=$request->input('payment_option');
            $payment->save();

            foreach($request->input('checkouts') as $checkOutID){

                $checkOut=CheckOut::where(['id'=>$checkOutID,'customer_id'=>Auth::user()->id,'payment_id'=>null])->first();
                $checkOut->payment_id=$payment->id;
                $checkOut->update();
            }
            return redirect()->action('Dashboard\CustomerController@showUnpaidOrders')->with(['success'=>['Odeme kaydı oluşturuldu']]);

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
