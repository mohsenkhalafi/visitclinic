<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public function patient()
    {
        return $this->belongsTo('Schedule', 'pcode');
    }
}
