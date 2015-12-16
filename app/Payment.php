<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=['payment_info_id','does_supplier_confirm','text'];
    //

    public function checkOuts(){
        return $this->hasMany('App\CheckOut');
    }

}
