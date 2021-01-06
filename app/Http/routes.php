<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//namespace\App\Http\Controllers\DataController::class;

use Illuminate\Foundation\Support;

Route::get('/', function () {
    return view('main') ;
});
Route::get('regpat', function () {
    return view('regpat') ;
});
Route::get('docpat', function () {
    return view('docpat') ;
});
    Route::get('getappoint', function () {
        return view('getappoint') ;
});
Route::get('welcome', function () {
    return view('welcome');
});
Route::get('query', function () {
    return view('query');
});
Route::get('login', 'LoginControl@authenticate');
Route::post('login', 'LoginControl@authenticatepost');

//Route::post('ajax', 'TestController@ajaxRequestPost');
//Route::get('ajax','TestController@ajaxRequest');
Route::post('upload/{dcode}/{timeid}',['uses'=>'Usercontroller@upload']);
Route::post('regpat',['uses'=>'UserController@bstore']);
Route::post('docpat',['uses'=>'UserController@dsave']);
Route::post('cmreg/{id}',['uses'=>'Usercontroller@cmreg']);
Route::post('prreg/{id}',['uses'=>'Usercontroller@prreg']);
Route::post('bisave',['uses'=>'Usercontroller@bisave']);
Route::post('docsave',['uses'=>'Usercontroller@docsave']);
Route::post('index',['as' => 'Home','uses' => 'LoginControl@authenticate']);
Route::post('home',['as' => 'admin','uses' => 'LoginControl@index']);
Route::post('addtimes',['as' => 'Add','uses' => 'DataController@store']);
Route::post('timesho',['as' => 'Addtime','uses' => 'TimeController@timelist']);
Route::post('timeshow',['as' => 'Addtime','uses' => 'TimeController@timesho']);
Route::get('recieve',function() {
$code=session()->get('dcode');
    $view = DB::table('patient')
        ->leftjoin('documents', 'patient.id', '=', 'documents.pcode')
        ->select('documents.*', 'patient.*')
        ->where('documents.dcode', $code)->get();
    return view('recieve',compact('view'));
});
//Route::post('addtime',['as' => 'Addtime','uses' => 'TimeController@timetablelist']);
Route::get('addtimes',function(){return view('addtimesho');});
Route::get('timee',function() {
    $shows = DB::table('doctor')
        ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
        ->select('doctor.code', 'drtime.id as id', 'drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour as fhour', 'drtime.thour as thour')
        ->get();
    return view('shotimes', compact('shows'));

});
Route::get('timese',function() {
    $shows = DB::table('doctor')
        ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
        ->select('doctor.code', 'drtime.id as id', 'drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour as fhour', 'drtime.thour as thour')
        ->get();
    return view('shotimees', compact('shows'));
});
Route::post('timee',function(){return view('shotimes');});

Route::any('test/{id}','TestController@index');
Route::get('report',function(){

    $show = DB::table('doctor')->get();




    return view('report',compact('show'));});
Route::get('doctor',function(){
    $show = DB::table('doctor')
        ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
        ->leftjoin('schedule','schedule.dcode','=','drtime.dcode')
        ->select('drtime.*','doctor.*','schedule.*')->get();
        $count=count($show);
    return view('doctor',compact('show'));});
Route::get('contact-me', ['as' => 'contact', 'uses' => 'ContactController@contactForm']);
Route::post('contact-me', ['as' => 'contact_send', 'uses' => 'ContactController@contactSend']);
Route::get('date',['uses'=>'sendmail@extractdate']);
Route::get('admin',function(){return view('panel');});
Route::get('index',function() {
    return view('index');
});
Route::get('test',['uses' => 'TestController@index']);
//Route::get('addtime',['middleware' => 'addtime','uses' => 'Usercontroller@addtime']);
Route::get('addtime',['middleware' => 'addtime','uses' => 'Usercontroller@addtime']);
Route::get('getappoint',['uses'=>'TimeController@timelist']);
route::get('doctorreg',function(){
    return view('doctorreg');
});
route::get('bimarreg',function(){
    return view('bimarreg');
});
route::get('timelist',function(){
    return view('schlist');
});
route::get('getazmayesh',function(){
    return view('getazmayesh');
});
route::get('admin',function() {
return view('panel');
});
route::get('schedule',function(){
    $code=session()->get('pcode');
    $show = DB::table('doctor')
        ->leftjoin('schedule', 'schedule.dcode', '=', 'doctor.code')
        ->leftjoin('documents', 'documents.pcode', '=','schedule.pcode' )
        ->leftjoin('drtime','drtime.id','=','documents.drtimeid')
        ->select('schedule.*','doctor.*','documents.*','schedule.drtimeid as id','schedule.dcode as dcode')
        ->where('schedule.pcode', $code)->get();
    return view('schedule', compact('show'));
});
Route::post('timed/{id}/{_xd}',['uses'=>'TimeController@timereg']);
Route::get('timedel/{id}',['uses'=>'TimeController@timedel']);
Route::get('cancel/{id}',['uses'=>'TimeController@cancel']);
Route::get('logout',['uses'=>'Usercontroller@logout']);
//Route::get('getappoint',['uses'=>'DataController@create']);
Route::get('send',['uses'=>'ContactController@contactSend']);
Route::get('expert/{q}',['uses'=> 'DataController@Show']);
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
Route::get('part',['uses'=>'Datacontroller@part']);
route::get('testyi',['uses'=> 'Datacontroller@inheritance']);
//Route::get('/','DataController@index');

Route::get('search/{id}',['uses'=>'Datacontroller@search']);
Route::get('search',function(){
    return view('search');
});






Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
