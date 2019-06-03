<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($idCatalog=null)
    {
        $catalogs = DB::table('catalogs')->get();
        $action=\request('action');

        if($idCatalog!=null) {
            $products = DB::table('products')->where('catalog_id',$idCatalog)->paginate(16);
        }
        else $products = DB::table('products')->paginate(16);
        $count = count($products);

        if($action=='ajax'){
            $response=['products'=>$products];
            return $response;
        }
        //dd($products[4]);
       // dd($count);
        return view('home',['products'=>$products,'count'=>$count,'catalogs'=>$catalogs]);
    }
}
