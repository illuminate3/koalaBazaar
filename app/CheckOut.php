<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table='check_outs';
    protected $fillable=['product_id','customer_id','customer_email','product_name','product_price'];
}
