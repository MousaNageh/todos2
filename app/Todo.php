<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Todo extends Model
{
    protected $fillable=["user_id","title","content","image","complete"] ;
    public function user(){
        return $this->belongsTo(User::class,"user_id") ; 
    } 
    public function deleteImage(){
        Storage::delete($this->image);
    }
}

