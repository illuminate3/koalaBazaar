<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $fillable=['phone','id'];
    public $timestamps=false;
    public $incrementing=false;
    public function user(){
        return $this->belongsTo('App\User','id','id');
    }
    public function instagramAccount(){

        return $this->morphOne('App\InstagramAccount','instagramable','instagramable_type','instagramable_id','id');
    }

    public function addresses() {
        return $this->hasMany('App\Address');
    }

    public function wishedProducts() {
        return $this->hasMany('App\WishedProduct');
    }

    public function checkOuts(){
        return $this->hasMany('App\CheckOut');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function rankings() {
        return $this->hasMany('App\Ranking');
    }


}
