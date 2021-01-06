<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use DateTime;
class sendmail extends Controller
{
    public function extractdate()
    {
        $date=DB::table('schedule')->where('pcode','1')->pluck('maildate');
      $da=  implode($date);
      $ch=strtotime($da);
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $date=date('Y/m/d',$ch);
        $now= \Carbon\Carbon::now()->format('Y/m/d');


        if($date==$now){
            echo "Yes";
        }
        else
        {
            echo "No";
        }
    }
}
