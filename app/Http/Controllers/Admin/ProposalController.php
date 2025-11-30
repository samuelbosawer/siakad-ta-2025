<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Proposal::with('mahasiswa') // relasi ke mahasiswa
            ->when($request->s, function ($query) use ($request) {

                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    // Cari di kolom Proposal
                    $q->where('judul', 'LIKE', '%' . $s . '%')
                        ->orWhere('status', 'LIKE', '%' . $s . '%')
                        ->orWhere('tanggal', 'LIKE', '%' . $s . '%');

                    // Cari di relasi mahasiswa
                    $q->orWhereHas('mahasiswa', function ($m) use ($s) {
                        $m->where('nama_depan', 'LIKE', '%' . $s . '%')
                            ->orWhere('nama_belakang', 'LIKE', '%' . $s . '%');
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.proposal.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        return view('admin.proposal.create-update-show', compact('mahasiswas'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'berkas'        => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'status'        => 'required|string',
            'mahasiswa_id'  => 'required|integer',
        ]);

        // Upload file berkas
        if ($request->hasFile('berkas')) {
            $validated['berkas'] = $request->file('berkas')->store('proposal/berkas', 'public');
        }

        Proposal::create($validated);

        Alert::success('Berhasil', 'Data proposal berhasil ditambahkan');
        return redirect()->route('dashboard.proposal');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
         $judul = 'DETAIL DATA PROPOSAL';
          $data = Proposal::where('id',$id)->first();
        return view('admin.proposal.create-update-show', compact('mahasiswas','judul','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
         $judul = 'UBAH DATA PROPOSAL';
         $data = Proposal::where('id',$id)->first();
        return view('admin.proposal.create-update-show', compact('mahasiswas','judul','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        $validated = $request->validate([
            'judul'         => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'berkas'        => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'status'        => 'required|string',
            'mahasiswa_id'  => 'required|integer',
        ]);

        // Jika upload file baru
        if ($request->hasFile('berkas')) {

            // Hapus file lama
            if ($proposal->berkas && \Storage::disk('public')->exists($proposal->berkas)) {
                \Storage::disk('public')->delete($proposal->berkas);
            }

            // Upload file baru
            $validated['berkas'] = $request->file('berkas')->store('proposal/berkas', 'public');
        }

        $proposal->update($validated);

        Alert::success('Berhasil', 'Data proposal berhasil diperbarui');
        return redirect()->route('dashboard.proposal');
    }

    // Hapus data
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);

        // Hapus file berkas jika ada
        if ($proposal->berkas && \Storage::disk('public')->exists($proposal->berkas)) {
            \Storage::disk('public')->delete($proposal->berkas);
        }

        // Hapus data dari database
        $proposal->delete();

        Alert::success('Berhasil', 'Data proposal berhasil dihapus');
        return redirect()->route('dashboard.proposal');
    }
}
