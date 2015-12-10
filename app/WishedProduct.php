<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishedProduct extends Model
{
    protected $table = 'wished_products';

    protected $fillable = ['customer_id','count', 'product_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');

    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
    //
}
