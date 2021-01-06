<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    //


    public function patient(){

        return $this->belongsTo(patient::class,'foreign_key');
    }
}
