<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='suppliers';
    protected $fillable=['phone','id','shop_name',
        'supplier_id',
        'country',
        'city',
        'description',
        'profile_image',
        'cover_image',
        'social_links'];

    protected $casts=['social_links'=>'json'];
    public $timestamps=false;
    public $incrementing=false;
    public function user(){
        return $this->belongsTo('App\User','id','id');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }


    public function instagramAccount(){

        return $this->morphOne('App\InstagramAccount','instagramable','instagramable_type','instagramable_id','id');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable','commentable_type','commentable_id','id');
    }
    public function ranks(){
        return $this->morphMany('App\Ranking','rankable','rankable_type','rankable_id','id');
    }

    public function paymentInfos() {
        return $this->hasMany('App\PaymentInfo');
    }


}
