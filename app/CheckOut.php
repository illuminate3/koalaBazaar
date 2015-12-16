<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table='check_outs';
    protected $fillable=['product_id','supplier_id','count','current_unit','description','image','customer_id','customer_email','product_title','product_price','payment_id','confirmed_by_supplier','received_by_customer','receiver_address_id','bill_address_id'];

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }


    public function billAddress(){
        return $this->belongsTo('App\Address','bill_address_id','id');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }


    public function receiverAddress(){
        return $this->belongsTo('App\Address','receiver_address_id','id');
    }
}
