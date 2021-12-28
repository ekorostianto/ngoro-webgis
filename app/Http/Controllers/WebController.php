<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function featuresUsaha(){
        $usaha = DB::table('featuresUsaha')->first();
        return $usaha->jsonb_build_object;
    }
    public function index()
    {        
        return view('web');
    }

}