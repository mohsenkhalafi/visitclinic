<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;




class SearchController extends Controller

{

    public function index()

    {

        return view('search.search');

    }



    public function search( $id)

    {
        $code = str_replace("q=", "", $id);




            $products=DB::table('doctor')->where('code',$code)->get();



                foreach ($products as $key => $product) {

                    echo '<tr>'.

                        '<td class="text-left">'.$product->fname.'</td>'.

                        '<td class="text-left">'.$product->lname.'</td>'.

                        '<td class="text-left">'.$product->expert.'</td>'.

                        '<td class="text-left">'.$product->code.'</td>'.

                        '</tr>';


                }














    }

}