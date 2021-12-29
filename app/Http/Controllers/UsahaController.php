<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MStaack\LaravelPostgis\Geometries\Point;

use App\Usaha;

class UsahaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $usaha = Usaha::where('fk_usaha_id', Auth::user()->id)->get();;
    	return view('pemilik/daftarusaha', compact('usaha'));
    }
    public function tambah()
    {   
        return view('pemilik/usaha_tambah');        
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'alamat' => 'required',
            'ltg' => 'required',
            'bjr' => 'required',
            'telp' => 'required',
            'jam_operasional' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);
        $file = $request->file('foto');
		$nama_file = time()."_".$file->getClientOriginalName();
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_foto';
		$file->move($tujuan_upload,$nama_file);
        Usaha::create([
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'alamat' => $request->alamat,
            'ltg' => $request->ltg,
            'bjr' => $request->bjr,
            'koordinat' => new Point($request->ltg, $request->bjr),
            'telp' => $request->telp,
            'jam_operasional' => $request->jam_operasional,
            'deskripsi' => $request->deskripsi,
            'foto' => $nama_file,          
            'fk_usaha_id' => Auth::user()->id,            
        ]);
    	return redirect('/usaha');
    }
    public function edit($id)
    {
        $usaha = Usaha::where('id', $id)->first();
        return view('pemilik/usaha_edit', ['daftar_usaha' => $usaha]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jam_operasional' => 'required',
            'deskripsi' => 'required'
        ]);

        $usaha = Usaha::find($id);
        $usaha->nama_usaha = $request->nama_usaha;
        $usaha->jenis_usaha = $request->jenis_usaha;
        $usaha->alamat = $request->alamat;
        $usaha->ltg = $request->ltg;
        $usaha->bjr = $request->bjr;
        $usaha->koordinat = new Point($request->ltg, $request->bjr);
        $usaha->telp = $request->telp;
        $usaha->jam_operasional = $request->jam_operasional;
        $usaha->deskripsi = $request->deskripsi;
        $usaha->save();
        return redirect('/usaha');
    }
    public function delete($id)
    {
        $usaha = Usaha::find($id);
        $usaha->delete();
        return redirect('/usaha');
    }    
}
