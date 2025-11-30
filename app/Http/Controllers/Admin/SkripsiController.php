<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SkripsiController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Skripsi::with(['proposal.mahasiswa'])
            ->when($request->s, function ($query) use ($request) {

                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    // 🔍 Cari di kolom skripsi
                    $q->where('status', 'LIKE', '%' . $s . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $s . '%');

                    // 🔍 Cari di relasi proposal
                    $q->orWhereHas('proposal', function ($p) use ($s) {
                        $p->where('judul', 'LIKE', '%' . $s . '%')  // judul proposal
                            ->orWhere('tanggal', 'LIKE', '%' . $s . '%');
                    });

                    // 🔍 Cari di relasi mahasiswa melalui proposal
                    $q->orWhereHas('proposal.mahasiswa', function ($m) use ($s) {
                        $m->where('nama_depan', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_belakang', 'LIKE', '%' . $s . '%');
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.skripsi.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $propsal = Proposal::orderBy('id', 'desc')->get();
        return view('admin.skripsi.create-update-show', compact('propsal'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_proposal' => 'required|integer',
            'status'      => 'required|string',
            'keterangan'  => 'nullable|string',
            'berkas'      => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        // Upload file
        if ($request->hasFile('berkas')) {
            $validated['berkas'] = $request->file('berkas')->store('skripsi/berkas', 'public');
        }

        Skripsi::create($validated);

        Alert::success('Berhasil', 'Data skripsi berhasil ditambahkan');
        return redirect()->route('dashboard.skripsi');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $propsal = Proposal::orderBy('id', 'desc')->get();
        $data = Skripsi::where('id',$id)->first();
        $judul = 'DETAIL SKRIPSIs';
        return view('admin.skripsi.create-update-show', compact('propsal','data','judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $propsal = Proposal::orderBy('id', 'desc')->get();
        $data = Skripsi::where('id',$id)->first();
        $judul = 'DETAIL SKRIPSIs';
        return view('admin.skripsi.create-update-show', compact('propsal','data','judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $skripsi = Skripsi::findOrFail($id);

        $validated = $request->validate([
            'id_proposal' => 'required|integer',
            'status'      => 'required|string',
            'keterangan'  => 'nullable|string',
            'berkas'      => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        // Update berkas jika ada upload baru
        if ($request->hasFile('berkas')) {

            // Hapus file lama jika ada
            if ($skripsi->berkas && Storage::disk('public')->exists($skripsi->berkas)) {
                Storage::disk('public')->delete($skripsi->berkas);
            }

            // Upload file baru
            $validated['berkas'] = $request->file('berkas')->store('skripsi/berkas', 'public');
        }

        $skripsi->update($validated);

        Alert::success('Berhasil', 'Data skripsi berhasil diperbarui');
        return redirect()->route('dashboard.skripsi');
    }

    // Hapus data
    public function destroy($id)
    {
        $skripsi = Skripsi::findOrFail($id);

        // Hapus file jika ada
        if ($skripsi->berkas && Storage::disk('public')->exists($skripsi->berkas)) {
            Storage::disk('public')->delete($skripsi->berkas);
        }

        $skripsi->delete();

        Alert::success('Berhasil', 'Data skripsi berhasil dihapus');
        return back();
    }
}
