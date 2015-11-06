<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table='products';

    protected $fillable=['supplier_id','id','title','description','is_active','image','price','current_unit'];

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }

    public function comments() {
        return $this->morphMany('App\Comment','commentable','commentable_type','commentable_id','id');
    }

    public function ranks() {
        return $this->morphMany('App\Ranking','rankable','rankable_type','rankable_id','id');
    }
}
