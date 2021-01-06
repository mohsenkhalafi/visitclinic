<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Http\Requests;
use DB;

class LoginControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        session()->put('table', 'admin');
        $post = DB::table('admin')->where('username', $username)
            ->where('password', $password)->first();
        if (count($post)) {
            return view('index');
            session()->put('state', 'yes');
        } else {
            session()->put('state', 'no');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Monshi;

        $post->fname = 'Ahmad';
        $post->lname = 'Alavi';
        //$post -> date = new DateTime;

        $post->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $username = $request->input('username');
        $password = $request->input('password');
        //  DB::insert('insert into bimar ('$fname,$lname,$username,$password)values(?,?,?,?)',[$fname],['$lname'],['username'],['password] ) ;
        $co = DB::insert('insert into patient (lname,fname,username,password) values(?,?,?,?)', [$fname, $lname, $username, $password]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sat = $request->input('username');
        $password = $request->input('password');
        $table = $request->input('level');
        // $result = DB::select("select * from ".$table." WHERE ( password= '$password' and username = '$username' )  ");
        // return $result;

        // $query = DB::select("select * from ".$table." WHERE ( password= '$password' and username = '$username' )  ");
        $term = array();
        // while ($row = mysql_fetch_array($query))
        {
            //    $term = $row['fname'];
            //    $counter = $row['counter'];
            // session_start();
            //     session()->put('fname', $term);


        }

    }

    public function edit($id)
    {
        //
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

    public function authenticate()
    {


        return view('welcome');
    }

    public function authenticatepost(Request $request)
    {
        session()->regenerate();


        $username = $request->input('username');
        $password = $request->input('password');

        $type = DB::table('users')->where('username', $username)
            ->where('password', $password)->pluck('type');

        $kind = implode($type);
        if (count($type)) {
            if ($kind == 'patient') {

                session()->put('patient', 'true');

                  return  response()->json(['auth'=>'true','redirecturl' => 'index']);


            } else if ($kind == 'doctor') {
                session()->put('doctor', 'true');
                return response()->json(['auth' => 'true', 'redirecturl' => 'index']);


            }

        } else {

            return response()->json(['Msg' => 'error']);
        }
    }
}



