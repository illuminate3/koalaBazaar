<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramAccount extends Model
{
    protected $table='instagram_accounts';
    protected $fillable=['instagramable_id','instagramable_type','instagram_id','username','access_token','full_name','bio','website','profil_picture',];

    public function instagramable(){
        return $this->morphTo();
    }

    public function isSupplier(){
        return ($this->instagramable_type=='App\Supplier')? true : false ;
    }

    public function isCustomer(){
        return ($this->instagramable_type=='App\Customer')? true : false;
    }

}
