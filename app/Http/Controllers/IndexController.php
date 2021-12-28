<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usaha;
use App\Kegiatan;

class IndexController extends Controller
{
    public function index()
    {
        $usaha = Usaha::inRandomOrder()
        ->limit(10)
        ->get();
        $all = Kegiatan::get();
        $budaya = Kegiatan::where('tema', 'Budaya')
            ->get();   
        $lomba = Kegiatan::where('tema', 'Lomba')
            ->get();
        return view('index', compact('usaha', 'all', 'budaya', 'lomba'));
    }
}
