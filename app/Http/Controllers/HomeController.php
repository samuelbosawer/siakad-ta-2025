<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kkn;
use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Pengumuman;
use App\Models\Prodi;
use App\Models\Proposal;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $jumlahDosen     = Dosen::count();
        $jumlahKkn        = Kkn::count();
        $jumlahMagang     = Magang::count();
        $jumlahMahasiswa  = Mahasiswa::count();
        $jumlahProposal   = Proposal::count();
        $jumlahSkripsi    = Skripsi::count();

       $pengumuman = Pengumuman::latest('id')
                        ->limit(3)
                        ->get();

        
        return view('visitor.home',compact(
            'jumlahDosen',
            'jumlahKkn',
            'jumlahMagang',
            'jumlahMahasiswa',
            'jumlahProposal',
            'jumlahSkripsi',
            'pengumuman'
        ));
    }

    public function sejarah()
    {
        $data = Prodi::where('id',1)->first();
        return view('visitor.sejarah',compact('data'));
    }
    
    public function visi_misi()
    {
        $data = Prodi::where('id',1)->first();
        return view('visitor.visi-misi',compact('data'));
    }

    public function struktur()
    {
        $data = Prodi::where('id',1)->first();
        return view('visitor.struktur',compact('data'));
    }

    public function dosen()
    {
        $datas = Dosen::get();
        return view('visitor.dosen',compact('datas'));
    }

    public function pengumuman()
    {
        $datas = Pengumuman::get();
        return view('visitor.pengumuman',compact('datas'));

    }
}
