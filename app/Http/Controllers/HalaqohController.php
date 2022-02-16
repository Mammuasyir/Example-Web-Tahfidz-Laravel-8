<?php

namespace App\Http\Controllers;

use App\Models\Halaqoh;
use App\Models\jenjang;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HalaqohController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $title = "List Halaqoh";
        $i = 1;
        $jenjang = jenjang::all();
        $kelas = Kelas::all();
        $halaqoh = Halaqoh::orderBy('id', 'desc')->get();
            return view('halaqoh.index', compact('title', 'halaqoh', 'i', 'kelas', 'jenjang')
        );
    }


public function addHalaqoh(Request $request) 
{
    // return dd($request);
    Halaqoh::create([
        'nama_halaqoh'  => $request->nama_halaqoh,
        'nama_guru'     => $request->nama_guru,
        'jenjang_id'    => $request->jenjang_id,
        'kelas_id'      => $request->kelas_id,
        'slug'          => Str::slug($request->nama_halaqoh,'-')
    ]);
    return redirect()->back()->with('success','Data berhasil ditambahkan!');
}


public function editHalaqoh(Request $request, $id)
{
        
            Halaqoh::findOrfail($id)->update([
                'nama_halaqoh'  => $request->nama_halaqoh,
                'nama_guru'     => $request->nama_guru,
                'jenjang_id' => $request->jenjang_id,
                'kelas_id'      => $request->kelas_id,
                'slug'          => Str::slug($request->nama_halaqoh,'-')
        ]);
    return redirect()->back()->with('success','Data berhasil diubah!');
}

public function delHalaqoh($id)
    {
        // return dd($id);
        Halaqoh::findOrFail($id)->delete();
        return redirect()->back()->with('failed','Data Berhasil Dihapus!');
    }
}
