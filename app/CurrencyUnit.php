<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyUnit extends Model
{
    protected $table='currency_units';
    protected $fillable=['unit_name','unit_short_name'];
    public $timestamps=false;

    public function products(){
        return $this->belongsToMany('App\Product');
    }

}
