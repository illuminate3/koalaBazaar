<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishedProduct extends Model
{
    protected $table = 'wished_products';

    protected $fillable = ['customer_id', 'product_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');

    }
    //
}
