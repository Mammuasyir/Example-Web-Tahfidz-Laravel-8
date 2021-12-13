<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $title = "Berita";
        $i = 1;
        $berita = Berita::orderBy('id', 'desc')->get();
        return view(
            'berita.index',
            compact('title', 'berita', 'i')
        );
    }

    public function show($id)
    {
        $title = "Artikel";
        $berita = Berita::findOrFail($id);

        return view('berita.show', compact('title', 'berita'));
    }

    public function makeBerita()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $berita = Berita::all();

        return view('berita.make', compact('berita'));
    } 


    public function addBerita(Request $request)
    {
        // return dd($request);
        Berita::create([
            'judul'         => $request->judul,
            'isi'           => $request->isi,
            'image'         => $request->image

        ]);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }


    public function editBerita($id)
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $title = "Edit Berita";
        $berita = Berita::findOrfail($id);

        return view('berita.edit', compact('berita', 'title'));
    }

    public function updateBerita(Request $request, $id)
    {

        if (empty($request->image)) {
        Berita::findOrfail($id)->update([
            'judul'         => $request->judul,
            'isi'           => $request->isi,
            // 'image'         => $request->file('image')->store('image-berita')
        ]);
        return redirect()->route('berita.index')->with('success', 'Data berhasil diubah!');
    } else {
        $berita = Berita::findOrfail($id);
            Storage::delete($berita->image);
            $berita->update([
            'judul'         => $request->judul,
            'isi'           => $request->isi,
            'image'         => $request->image
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
}

    public function delBerita($id)
    {
        // return dd($id);
        $berita = Berita::where('id', $id)->first();
        Storage::delete($berita->image);
        Berita::findOrFail($id)->delete();
        return redirect()->back()->with('failed', 'Data Berhasil Dihapus!');
    }
}
