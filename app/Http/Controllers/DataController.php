<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Routing\Controller;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Morilog\Jalali\JalaliServiceProvider;
use \Morilog\Jalali\jDateTime;
use Carbon;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        return view('search.search');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sho = DB::table('doctor')->get();
        return view('getappoint', compact('sho'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $fhour = Input::get('fhour');
        $thour = Input::get('thour');
$date2=Input::get('dates');
$date=Input::get('date');





        list($jYear, $jMonth, $jDay ) = $date = explode ("/",$date);
        list( $gyear, $gmonth, $gday )=\Morilog\Jalali\jDateTime::toGregorian($jYear, $jMonth, $jDay);

        $gdate = $gyear."/".$gmonth."/".$gday;

        $n='1';
        $result=strtotime($gdate. '-'.$n.'days');
$result=date("Y-m-d",$result);


        $r = Carbon\Carbon::createFromFormat('Y-m-d', $result);
$dcode=session()->get('dcode');



      DB::table('drtime')->insert(['fhour' => $fhour, 'thour' => $thour,'date'=>$date2,'dcode'=>$dcode,'status'=>'قابل اخذ','maildate'=>$r]);
        // return response()->json();
       return redirect('addtime');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $expert = DB::table('doctor')->get();

        $shows = DB::table('doctor')
            ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
            ->select('doctor.code', 'drtime.id as id', 'drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour as fhour', 'drtime.thour as thour')
           -> get();
     // return view('shotimes',compact(['shows','expert']));

//return view('shotimes',compact('expert'));
    }
    public function search( $id)

    {
        $code = str_replace("q=", "", $id);




        $products=DB::table('doctor')->where('expert',$code)->get();



        foreach ($products as $key => $product) {

            echo '<tr>'.

                '<td class="text-left">'.$product->fname.'</td>'.

                '<td class="text-left">'.$product->lname.'</td>'.

                '<td class="text-left">'.$product->expert.'</td>'.

                '<td class="text-left">'.$product->code.'</td>'.

                '</tr>';


        }














    }

    public function edit($id)
    {
        $dat = Input::get('date');
        echo strrev($dat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function timesho(Request $request)
    {

    }


    public function docreg()
    {
        $user = Input::get('username');
        $pass = Input::get('password');
        $fname = Input::get('fname');
        $lname = Input::get('lname');
        $expert = Input::get('expert');
        $code = Input::get('code');
        DB::table('doctor')->insert(
            ['username' => $user, 'password' => $pass, 'fname' => $fname, 'lname' => $lname, 'expert' => $expert, 'code' => $code]
        );
        //   return response()->json();
    }

    public function bimarreg()
    {
        $user = Input::get('username');
        $pass = Input::get('password');
        $fname = Input::get('fname');
        $lname = Input::get('lname');
        $bimari = Input::get('bimari');

        DB::table('patient')->insert(
            ['username' => $user, 'password' => $pass, 'fname' => $fname, 'lname' => $lname, 'bimari' => $bimari]
        );


    }


    public function expert(Request $request)
    {
$output='';
       // $shows = DB::table('doctor')
        //    ->leftjoin('drtime', 'drtime.dcode', '=', 'doctor.code')
        //    ->select('doctor.code', 'drtime.id as id', 'drtime.status', 'doctor.expert', 'doctor.fname', 'doctor.lname', 'drtime.date', 'drtime.fhour as fhour', 'drtime.thour as thour')
        //    ->where ('doctor.code','4689')-> get();
        $shows=DB::table('doctor')->where('code','LIKE','%'.$request->search."%")->get();
        //compact('shows');
     //   $expert=implode($expert);
      //  $data = view('shotimes',compact('shows'))->render();

      //  return response()->json(['options'=> $data]);
foreach ($shows as $value) {
    $output .= '<tr>' .

        '<td>' . $value->firstname . $value->lastname . '</td>' .

        '<td>' . $value->expert . '</td>' .


        '</tr>';
}
return Response($output);






}

function part()
{
$data=[
    'name' => 'Mohsen',
    'age' => '26',
    'fav'=>['book','football','game','movie'],
    'visible'=> false

];

    return view('part1',$data);
}

function inheritance(){
    $data=[
        'name' => 'Mohsen',
        'age' => '26',
        'fav'=>[
    ['id'=>1,'name'=>'book']
            ,['id'=>2,'name'=>'football']
            ,['id'=>3,'name'=>'game'],
            ['id'=>4,'name'=>'movie']


    ]
        ,'visible'=> false
        ];

        return view('test.foo',$data);
}



}