<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='addresses';
    protected $fillable=['address_name','name','surname','distinct','city','country','address_detail','zip_code','phone_number','customer_id'];

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
