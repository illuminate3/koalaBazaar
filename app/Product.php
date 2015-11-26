<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table='products';

    protected $fillable=['supplier_id','id','title','description','is_active','image','price','currency_unit_id'];

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function instagram(){
        return $this->hasOne('App\ProductsInstagram');
    }
    public function comments() {
        return $this->morphMany('App\Comment','commentable','commentable_type','commentable_id','id');
    }

    public function ranks() {
        return $this->morphMany('App\Ranking','rankable','rankable_type','rankable_id','id');
    }

    public function currencyUnit(){
        return $this->hasOne('App\CurrencyUnit','id','currency_unit_id');
    }
}
