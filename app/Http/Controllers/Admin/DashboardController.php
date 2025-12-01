<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Kkn;
use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function index()
    {
        // Count setiap model
        $jumlahDosen      = Dosen::count();
        $jumlahKkn        = Kkn::count();
        $jumlahMagang     = Magang::count();
        $jumlahMahasiswa  = Mahasiswa::count();
        $jumlahProposal   = Proposal::count();
        $jumlahSkripsi    = Skripsi::count();

        return view('admin.dashboard.index', compact(
            'jumlahDosen',
            'jumlahKkn',
            'jumlahMagang',
            'jumlahMahasiswa',
            'jumlahProposal',
            'jumlahSkripsi'
        ));
    }
}
