<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table='payment_infos';
    protected $fillable=['supplier_id','title','detail'];
    public $timestamps=false;
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}
