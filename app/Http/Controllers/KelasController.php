<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $title = "List Kelas";
        $i = 1;
        $kelas = Kelas::orderBy('id', 'desc')->get();
        return view(
            'kelas.index',
            compact('title', 'kelas', 'i')
        );
    }


    public function addKelas(Request $request)
    {
        // return dd($request);
        Kelas::create([
            'kelas' => $request->kelas
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }


    public function editKelas(Request $request, $id)
    {

        Kelas::findOrfail($id)->update([
            'kelas' => $request->kelas
        ]);
        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }

    public function delKelas($id)
    {
        // return dd($id);
        Kelas::findOrFail($id)->delete();
        return redirect()->back()->with('failed', 'Data Berhasil Dihapus!');
    }
}
