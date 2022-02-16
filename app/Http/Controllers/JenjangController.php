<?php

namespace App\Http\Controllers;

use App\Models\jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $title = "List Jenjang";
        $i = 1;
        $jenjang = jenjang::orderBy('id', 'desc')->get();
        return view(
            'jenjang.index',
            compact('title', 'jenjang', 'i')
        );
    }


    public function addJenjang(Request $request)
    {
        // return dd($request);
        jenjang::create([
            'jenjang' => $request->jenjang
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }


    public function editJenjang(Request $request, $id)
    {

        jenjang::findOrfail($id)->update([
            'jenjang' => $request->jenjang
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }

    public function deljenjang($id)
    {
        // return dd($id);
        jenjang::findOrFail($id)->delete();
        return redirect()->back()->with('failed', 'Data Berhasil Dihapus!');
    }
}
