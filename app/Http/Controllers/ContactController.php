<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;
use DB;
class ContactController extends Controller
{
    public function contactForm()
    {
        return view('emails.contact');
    }
    public function contactSend(Request $request)
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d');
        $show = DB::table('patient')
            ->leftjoin('schedule', 'patient.id', '=', 'schedule.pcode')
            ->select('schedule.*', 'patient.*')
            // ->where('schedule.pcode','1')->get();
            ->whereDate('schedule.maildate', '=', $now)->get();
        echo $now;
        foreach ($show as $list) {
            $message = $list->date;
            $mail = $list->email;
            $time = $list->hour;
            $name = $list->fname;


///////////////////////////////////////////////////////////////////////
            //  $date=DB::table('schedule')->where('pcode','1')->pluck('maildate');
            // $da=  implode($date);
            //  $ch=strtotime($da);
            $current_time = \Carbon\Carbon::now()->toDateTimeString();

            //  $date=date('Y/m/d',$ch);


            //  if($date==$now){
            // $name= $request->input('name');
            // $email= $request->input('email');
            //  $message= $request->input('message');
            Mail::send('emails.email', array(
                'time' => $time,
                'name' => $name,
                'email' => $mail,
                'date' => $message,
            ), function ($message) use ($mail, $name) {
                $message->from($mail, 'درمانگاه');
                $message->to($mail)->subject('یاد آوری نوبت');
            });
            //  }
            //  else
            //  {
            //      echo "No";
        }

        ////////////////////////////

    }

    }

