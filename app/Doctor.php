<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
   public function doctor(){


       return $this->belongsTo('Schedule', 'dcode');
       }

}
