<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Contact;
use Dompdf\Dompdf;
use App\Models\Halaqoh;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;


class LandingController extends Controller
{

    public function portal()
    {
        $berita = Berita::all();

        return view('landing.portal-berita', compact('berita'));
    }

    public function read($id)
    {
        
        $berita = Berita::findOrfail($id);
        $title = "$berita->judul";

        return view('landing.read-berita', compact('berita', 'title'));
    }

    public function dashboard()
    {
        $a = 1;
        $i = 1;
        $contact = Contact::take(4)->orderBy('id', 'desc')->get();
        $kelas = Kelas::all();
        $halaqoh = Halaqoh::orderBy('id', 'desc')->simplePaginate(6);
        $berita = Berita::orderBy('id', 'desc')->get();
        $sort = Siswa::take(5)->orderBy('total_hafalan', 'desc')->get();
        $asc = Siswa::take(5)->orderBy('total_hafalan', 'asc')->get();

        return view('dashboard', compact('kelas', 'halaqoh', 'berita', 'sort', 'i', 'asc','contact', 'a'));
    }

    public function perKelas($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $title = "Kelas $kelas->kelas";
        $halaqoh = Halaqoh::where('kelas_id', $kelas->id)->get();
        return view('landing.perkelas', [
            'halaqoh' => $halaqoh,
            'title'  => $title,
            'kelas' => $kelas,
        ]);
    }

    public function perHalaqoh($slug)
    {
        $sis = Siswa::all();
        $halaqoh = Halaqoh::where('slug', $slug)->first();
        $title = "$halaqoh->nama_halaqoh";
        $siswa = Siswa::where('halaqoh_id', $halaqoh->id)->get();
        return view('landing.perhalaqoh', [
            'siswa' => $siswa,
            'title'  => $title,
            'halaqoh' => $halaqoh,
            'sis' => $sis
        ]);
    }

    public function perData($slug)
    {
        $sis = Siswa::all();
        $halaqoh = Halaqoh::where('slug', $slug)->first();
        $title = "$halaqoh->nama_halaqoh";
        $siswa = Siswa::where('halaqoh_id', $halaqoh->id)->get();
        return view('landing.perhalaqoh', [
            'siswa' => $siswa,
            'title'  => $title,
            'halaqoh' => $halaqoh,
            'sis' => $sis
        ]);
    }

    public function chart($slug)
    {
        $halaqoh = Halaqoh::where('slug', $slug)->first();
        $title = $halaqoh->nama_halaqoh;
        $siswa = Siswa::where('halaqoh_id', $halaqoh->id)->get();


        $categories = [];
        $data = [];

        foreach ($siswa as $ha) {
            $categories[] = $ha->nama_siswa;
            $data[] =  $ha->total_hafalan;
        }

        // dd($data); 
        return view('landing.grafik', compact('halaqoh', 'siswa', 'categories', 'data', 'title'));
    }

    public function sertif()
    {
        if (auth()->user()->role == 'User') {
            abort(403);
        }
        $title = "Sertifikasi";
        $siswaw = Siswa::all();

        return view('landing.sertif-data', compact('siswaw', 'title'));
    }

    public function sertifikat($id)
    {
        if (auth()->user()->role == 'User') {
            abort(403);
        }
        $title = "Certificate";
        $siswa = Siswa::find($id);

        return view('landing.sertifikat', compact('title', 'siswa'));
    }

    public function searchSiswa(Request $request)
    {
        $sis = Siswa::all();
        $keyword = $request->search;
        $cari = Siswa::where('nama_siswa', 'like', "%" . $keyword . "%")
        ->orWhere('total_hafalan', 'like', "%" . $keyword . "%")
        ->orWhere('kode_hafalan', 'like', "%" . $keyword . "%")->get();
        $title = "Data Siswa";
        return view('landing.search', compact('cari', 'title', 'keyword', 'sis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
