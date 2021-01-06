<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Mail;
class TimeController extends Controller
{


    public function timesho(Request $requests)
    {

        $ex = Input::get('expert');

        $name = Input::get('name');

        $show = DB::table('doctor')->where('lname', $name)->pluck('day');

        json_encode(['day' => $show]);

        return response()->json(['day' => $show]);

        return view('getappoint', compact('show'));
    }

    public function timelist(Request $request)
    {

$expert=$request->input('expert');

        $shows = DB::table('doctor')
            ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
            ->select('doctor.code', 'drtime.id','drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour', 'drtime.thour')
            ->where('doctor.expert', $expert)->get();

        return view('timelist', compact('shows'));


    }

    public function timereg(Request $request,$id, $_xd)
    {
        $bcode=session()->get('pcode');
        $pcode = str_replace("id=", "", $id);
        $s = str_replace("_xd=", "", $_xd);
       $time=$request->input('time');
$time=str_replace('<br>',"",$time);
        $result = DB::table('drtime')->where('id', $s)->pluck('date');
        $date = implode($result);
        $result = DB::table('drtime')->where('id', $s)->pluck('dcode');
        $pcode = implode($result);

        $fhour = implode($result);
        $result = DB::table('drtime')->where('id', $s)->pluck('maildate');
        $maildate = implode($result);



            $status = DB::table('schedule')->where('pcode', $bcode)
                ->where('dcode', $pcode)
                ->where('date', $date)->first();
            if(count($status)) {

                return redirect('shotimes');

                die();
            }
else{

    DB::table('schedule')->insert(['drtimeid'=>$s,'maildate'=>$maildate,'dcode' => $pcode, 'pcode' => '1', 'date' => $date, 'hour' => $time]);
    return redirect('schedule');
}













    }
    public function timedel($id)
    {
        $code = str_replace("id=", "", $id);
        DB::table('schedule')->where('drtimeid',$code)->delete();
        DB::table('documents')->where('drtimeid',$code)->delete();
        return redirect('schedule');
    }
    public function cancel($id)
    {
        $code = str_replace("id=", "", $id);

        $show = DB::table('schedule')->where('drtimeid', $code)->pluck('pcode');

            $pcode = implode($show);
        $show = DB::table('schedule')->where('drtimeid', $code)->pluck('hour');
                          $time =implode($show);
        $show = DB::table('schedule')->where('drtimeid', $code)->pluck('date');
                          $date = implode($show);

        $patient = DB::table('patient')->where('id', $pcode)->pluck('email');
                         $email = implode($patient);
        $patient = DB::table('patient')->where('id', $pcode)->pluck('lname');
                          $name = implode($patient);
            echo 'email:'.$email;

                Mail::send('emails.contact', array(
                    'time' => $time,
                    'name' => $name,

                    'date' => $date,
                ), function ($message) use ($email, $name) {
                    $message->from($email, 'درمانگاه');
                    $message->to($email)->subject('لغو حضور پزشک');
                });
                  DB::table('drtime')->where('id',$code)->delete();
                  return back();
            }



    public function timetablelist()
{

    //$code = session()->get('pcode');
$expert='قلب و عروق';
   // $name = Input::get('name');

    $show = DB::table('doctor')
        ->leftjoin('drtime','doctor.code','=','drtime.dcode')
        ->select('drtime.*','doctor.*')
        ->where('doctor.expert', $expert)->get();

   // return view('getappoint',compact('show'));
}
public function schedulelist()
{
    $fetch = DB::table('doctor')
        ->leftjoin('schedule', 'schedule.dcode', '=', 'doctor.code')
        ->select('doctor.code', 'drtime.id','drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour', 'drtime.thour')
        ->where('shedule.pcode', '1')->get();
    return redirect('schedule', compact('fetch'));

}



public function madarak()
{

    $pcode=session()->get('pcode');

    $show = DB::table('documents')->join('bimar','madrak.bcode','=','bimar.code')->where('madarak.pcode', $pcode)->get();

    //  return response()->json($show);

    return view('getappoint', compact('show'));
}
}