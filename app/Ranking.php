<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table='rankings';
    protected $fillable=['user_id','rankable','rankable_type','vote','is_confirmed'];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function rankable(){
        return $this->morphTo('rankable','rankable_type','rankable_id');
    }
}
