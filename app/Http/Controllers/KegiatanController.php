<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Kegiatan;

class KegiatanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kegiatan = Kegiatan::where('fk_kegiatan_id', Auth::user()->id)->get();     
    	return view('admin/kegiatan', ['kegiatan' => $kegiatan]);
    }
    public function tambah()
    {
        return view('admin/kegiatan_tambah');
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama_kegiatan' => 'required',
            'tema' => 'required',
            'jadwal' => 'required',
            'deskripsi' => 'required'
        ]);
        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tema' => $request->tema,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'fk_kegiatan_id' => Auth::user()->id,            
        ]);
    	return redirect('/kegiatan');
    }
    public function edit($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();
        return view('admin/kegiatan_edit', ['kegiatan' => $kegiatan]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_kegiatan' => 'required',
            'tema' => 'required',
            'jadwal' => 'required',
            'deskripsi' => 'required'
        ]);

        $kegiatan = Kegiatan::find($id);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;    
        $kegiatan->tema = $request->tema;
        $kegiatan->jadwal = $request->jadwal;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->save();
        return redirect('/kegiatan');
    }
    public function delete($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect('/kegiatan');
    }    
}
