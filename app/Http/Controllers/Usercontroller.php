<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use App\Http\Requests;
use Illuminate\Database\Query\Builder;
use Illuminate\Filesystem\FilEsystem;
use Mail;


use DB;
class Usercontroller extends Controller
{
public function sets(){
    session()->regenerate();
    $table=session()->get('table');
    $bcode=session()->get('pcode');
    $pcode=session()->get('dcode');
    //session()->get('test','test');
    if($table=='doctor'){
        $post=DB::table('doctor')->where('code',$pcode)->pluck('fname');
        $fname=implode($post);

        session()->put('fname',$fname);
        $post=DB::table('doctor')->where('code',$pcode)->pluck('lname');
        $lname=implode($post);
        session()->put('lname',$lname);
    }
    else
    {
        $post=\DB::table('patient')->where('id',$bcode)->first()->fname;
        $fname=implode($post);
        session()->put('fname',$fname);
        $post=\DB::table('patient')->where('id',$pcode)->first()->lname;
        $lname=implode($post);
        session()->put('lname',$lname);
    }


}
public function addtime(){

    return view('addtime');
}
public function logout()
{
                             session()->flush();
                             return redirect('welcome');
}
public function bisave(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');
    $fname = $request->input('fname');
    $lname = $request->input('lname');
    $email = $request->input('email');
    $status=DB::table('patient')->where('username',$username)->get();
    $mail=DB::table('doctor')->where('email',$email)->get();
    if(count($status)){
        session()->put('umsg','نام کاربری موجود است');
        return back();
        die();
    }
    if(count($mail)){
        session()->put('emsg','ایمیل موجود است');
        return back();
        die();
    }
    session()->put('username',$username);
    session()->put('password',$password);
    session()->put('fname',$fname);
    session()->put('lname',$lname);
    session()->put('email',$email);
    $code = str_random(6);
    session()->put('code',$code);

    Mail::send('emails.apply', array(
        'code' => $code,
    ), function ($message) use ($email, $fname) {
        $message->from($email, 'درمانگاه');
        $message->to($email)->subject('تایید اعتبار');
    });
    return redirect('regpat');

}
public function docsave(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');
    $fname = $request->input('fname');
    $lname = $request->input('lname');
    $expert=$request->input('expert');
    $email=$request->input('email');
    $code=$request->input('code');
    $status=DB::table('doctor')->where('username',$username)->get();
    $mail=DB::table('doctor')->where('email',$email)->get();
    if(count($status)){
        session()->put('dmsg','نام کاربری موجود است');
        return back();
        die();
    }
    if(count($mail)){
        session()->put('edmsg','ایمیل موجود است');
        return back();
        die();
    }
    session()->put('username',$username);
    session()->put('password',$password);
    session()->put('expert',$expert);
    session()->put('fname',$fname);
    session()->put('lname',$lname);
    session()->put('email',$email);
    session()->put('recode',$code);

    $code = str_random(6);
    session()->put('code',$code);

    Mail::send('emails.apply', array(
        'code' => $code,
    ), function ($message) use ($email, $fname) {
        $message->from($email, 'درمانگاه');
        $message->to($email)->subject('تایید اعتبار');
    });
    return redirect('docpat');

}
    public function upload(Request $request,$dcode,$timeid)
    {

        $pcode = session()->get('pcode');
        $dcode = str_replace("dcode=","", $dcode);
        $timeid=str_replace("timeid=","",$timeid);
        $destination = 'uploads/photos/'; // your upload folder
        $image       = $request->file('image');
        $filename    = $image->getClientOriginalName(); // get the filename
        $image->move($destination, $filename); // move file to destination
       DB::table('documents')->insert(['pcode'=>$pcode,'dcode'=>$dcode,'doctype'=>$filename,'drtimeid'=>$timeid]);
        session()->put('upload','ارسال شد');
        return redirect('schedule');

    }

    public function cmreg(Request $request,$id)
    {
        $pid=str_replace("id=","",$id);
        $cm= $request->input('comment');
        echo $pid;
        DB::table('documents')->where('id',$pid)->update(['comment'=>$cm]);
        return redirect('recieve');
    }

    public function prreg(Request $request,$id)
    {
        $pid=str_replace("id=","",$id);
        $pr= $request->input('pres');
        echo $pid;
        DB::table('documents')->where('id',$pid)->update(['pres'=>$pr]);
        return redirect()->back()->with('msg', ['ثبت شد']);
    }
    public function bstore(Request $request)
    {
        $ncode = $request->input('code');
        $username = session()->get('username');
      $password = session()->get('password');
      $fname = session()->get('fname');
       $lname= session()->get('lname');
       $email =session()->get('email');
$code=session()->get('code');
if($ncode==$code) {
    DB::table('patient')->insert(['username' => $username, 'password' => $password, 'fname' => $fname, 'lname' => $lname, 'email' => $email]);
    session()->put('fname', $fname);
    session()->put('lname', $lname);
    session()->put('state', 'yes');
    $id=DB::table('patient')->where('username',$username)->pluck('id');
    $pid=implode($id);
    session()->put('pcode',$pid);
    session()->put('table','patient');
    return redirect('index');
}
else{
    session()->put('msg','کد نادرست مجددا سعی کنید');
    return back();

}
    }
    public function dsave(Request $request){


                    $ncode=$request->input('code');
                    $code=session()->get('code');
if($ncode==$code) {
    $username = session()->get('username');
    $password = session()->get('password');
    $expert = session()->get('expert');
    $fname = session()->get('fname');
    $lname = session()->get('lname');
    $email = session()->get('email');
    $rcode=session()->get('recode');
    DB::table('doctor')->insert(['email' => $email, 'username' => $username, 'password' => $password, 'fname' => $fname, 'lname' => $lname, 'code' => $rcode, 'expert' => $expert]);
    session()->put('state', 'yes');
    session()->put('table', 'doctor');
    session()->put('dcode', $rcode);

    session()->put('fname', $fname);
    session()->put('lname', $lname);
    session()->put('state', 'yes');
    return redirect('index');
}
else{
    session()->put('dcmsg','کد نادرست می باشد مجددا سعی کنید');
    return back();
}
    }
}
