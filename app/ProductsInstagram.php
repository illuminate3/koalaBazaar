<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsInstagram extends Model
{
    protected $table='products_instagrams';
    protected $fillable=['product_id','url','image_url','caption','created_on_instagram'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
