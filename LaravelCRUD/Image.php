<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['data_id', 'fileUpload'];

    public function data(){
        return $this->belongsTo(Data::class);
    }
}
