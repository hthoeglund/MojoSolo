<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['user_id', 'data1', 'data2'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
