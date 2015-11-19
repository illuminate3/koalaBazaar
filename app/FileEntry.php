<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileEntry extends Model
{
    protected $table='file_entries';
    protected $fillable=['filename','mime','original_filename'];

    public function storeFromUrl($url,$path,$name){
        $counter=1;
        while(Storage::exists($path.'/'.$name.'.'.pathinfo($url, PATHINFO_EXTENSION))){
            $name=$name.'-'.$counter;
            $counter++;
        }
        $file=file_get_contents($url);


        if(Storage::put($path.'/'.$name.'.'.pathinfo($url, PATHINFO_EXTENSION),$file)){
            $this->filename=$path.'/'.$name.'.'.pathinfo($url, PATHINFO_EXTENSION);
            $this->mime=Storage::mimeType($path.'/'.$name.'.'.pathinfo($url, PATHINFO_EXTENSION));;
            $this->original_filename=$url;
            $this->save();
            return $this->id;
        }else{
            return false;
        }

    }
}
