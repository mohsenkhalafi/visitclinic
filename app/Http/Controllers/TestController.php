<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $request)

    {

      //  $input = request()->all();
        $name = $request->input('name');
        if ($name=='zx') {
           // $view = view("index",compact('title'))->render();

          //  return response()->json(['html'=>$view]);
          //  return response()->json(['Msg' => 'true']);
            return response()-> json( ['redirecturl' => 'index']);

        }
        else
        {
            return response()-> json( ['redirecturl' => 'ajax']);
        }
    }
}
