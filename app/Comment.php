<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable=['customer_id','commentable_id','commentable_type','comment_body','is_confirmed'];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function commentable(){
        return $this->morphTo('commentable','commentable_type','commentable_id');
    }

    //
}
