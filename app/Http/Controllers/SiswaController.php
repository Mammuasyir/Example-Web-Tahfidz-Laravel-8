<?php

namespace App\Http\Controllers;

use App\Models\Hafalanbaru;
use App\Models\Halaqoh;
use App\Models\Kelas;
use App\Models\Murajaah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'User') {
            abort(403);
        }
        $title = "List Siswa IDN";
        $i = 1;

        $kelas = Kelas::all();
        $halaqoh = Halaqoh::all();
        $siswa = Siswa::orderBy('id', 'desc')->get();
        return view(
            'siswa.index',
            compact('title', 'siswa', 'i', 'kelas', 'halaqoh')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $title = "Create Data-siswa";
        $halaqoh = Halaqoh::all();
        $i = 1;
        $siswa = Siswa::all();
        return view('siswa.create', [
            'siswa' => $siswa,
            'title' => $title,
            'halaqoh' => $halaqoh,
            'i' => $i,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswas = Siswa::create([
            'nama_siswa'    => $request->nama_siswa,
            'halaqoh_id'    => $request->halaqoh_id,
            'kode_hafalan' =>  'bebas', 
            'total_hafalan' => $request->total_hafalan,
            'image'         => $request->file('image')->store('image-siswa'),
        ]);
        $karakter_kode = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $siswas->kode_hafalan = substr(str_shuffle($karakter_kode), 0, 4);
        $siswas->update();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('image'))) {
            Siswa::findOrfail($id)->update([
                'nama_siswa' => $request->nama_siswa,
                'halaqoh_id' => $request->halaqoh_id,
                'total_hafalan' => $request->total_hafalan,
                // 'image'         => $request->file('image')->store('image-siswa')
            ]);
            return redirect()->route('siswa.index')->with('success', 'Data berhasil diupdate!');
        } else {
            $siswa = Siswa::findOrfail($id);
            Storage::delete($siswa->image);
            $siswa->update([
                'nama_siswa' => $request->nama_siswa,
                'halaqoh_id' => $request->halaqoh_id,
                'total_hafalan' => $request->total_hafalan,
                'image'         => $request->file('image')->store('image-siswa')
            ]);
            return redirect()->route('siswa.index')->with('success', 'Data berhasil diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        Storage::delete($siswa->image);
        Siswa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function dataHafalan($id)
    {
        $i  = 1;
        $sis = Siswa::all();
        $siswa = Siswa::where('id', $id)->first();
        $title = "$siswa->nama_siswa";
        $hafalan = Hafalanbaru::where('siswa_id', $siswa->id)->get();
        $murajaah = Murajaah::where('siswa_id', $siswa->id)->get();
        return view('data-hafalan.index', [
            'siswa'     => $siswa,
            'title'     => $title,
            'hafalan'   => $hafalan,
            'murajaah'   => $murajaah,
            'i'         => $i,
            'sis'       => $sis
        ]);
    }

    public function addHafalan(Request $request)
    {
        // return dd($request);
        Hafalanbaru::create([

            'siswa_id'      => $request->siswa_id,
            'juz'           => $request->juz,
            'surat'         => $request->surat,
            'ayat'          => $request->ayat,
            'jumlah_baris'  => $request->jumlah_baris,

        ]);
        return redirect()->back()->with('success', 'Hafalan baru berhasil ditambahkan');
    }


    public function editHafalan(Request $request, $id)
    {

        Hafalanbaru::findOrfail($id)->update([
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'jumlah_baris' => $request->jumlah_baris,
        ]);
        return redirect()->back()->with('success', 'Data Hafalan berhasil diubah!');
    }

    public function delHafalan($id)
    {
        // return dd($id);
        Hafalanbaru::findOrFail($id)->delete();
        return redirect()->back()->with('failed', 'Data Hafalan Berhasil Dihapus!');
    }

    public function addMurajaah(Request $request)
    {
        // return dd($request);
        Murajaah::create([

            'siswa_id'      => $request->siswa_id,
            'juz'           => $request->juz,
            'surat'         => $request->surat,
            'ayat'          => $request->ayat,
            'jumlah_baris'  => $request->jumlah_baris,

        ]);
        return redirect()->back()->with('success', 'Murajaah berhasil ditambahkan');
    }

    public function editMurajaah(Request $request, $id)
    {

        Murajaah::findOrfail($id)->update([
            'juz'           => $request->juz,
            'surat'         => $request->surat,
            'ayat'          => $request->ayat,
            'jumlah_baris'  => $request->jumlah_baris,
        ]);
        return redirect()->back()->with('success', 'Data Murajaah berhasil diubah!');
    }

    public function delMurajaah($id)
    {
        // return dd($id);
        Murajaah::findOrFail($id)->delete();
        return redirect()->back()->with('failed', 'Data Murajaah Berhasil Dihapus!');
    }
}
