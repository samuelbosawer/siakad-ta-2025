<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormKkn;
use App\Models\Kkn;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class FormKknController extends Controller
{
      // Tampilkan semua data
    public function index(Request $request)
    {
         $datas = FormKkn::with(['kkn', 'mahasiswa'])
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    $q->where('keterangan', 'LIKE', "%$s%");
                    

                    // cari berdasarkan data KKN
                    $q->orWhereHas('kkn', function ($m) use ($s) {
                        $m->where('nama_kkn', 'LIKE', "%$s%")
                        ->orwhere('status', 'LIKE', "%$s%")
                            ->orWhere('tahun', 'LIKE', "%$s%");
                    });

                    // cari berdasarkan data Mahasiswa
                    $q->orWhereHas('mahasiswa', function ($mh) use ($s) {
                        $mh->where('nama_depan', 'LIKE', "%$s%")
                            ->orWhere('nama_belakang', 'LIKE', "%$s%");
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.form-kkn.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $judul = 'TAMBAH DATA KKN MAHASISWA';
        $kkns = Kkn::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        return view('admin.form-kkn.create-update-show',compact('judul','kkns','mahasiswas'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'     => 'required|date',
            'kem_studi'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'bukti_bayar'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'kkn_id'         => 'required|integer',
            'status'         => 'required',
            'mahasiswa_id'         => 'required|integer',
            'keterangan'         => 'nullable|string',
        ]);

        // Upload file kem_studi
        if ($request->hasFile('kem_studi')) {
            $validated['kem_studi'] = $request->file('kem_studi')->store('kkn/kem_studi', 'public');
        }
          // Upload file bukti_bayar
        if ($request->hasFile('bukti_bayar')) {
            $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('kkn/bukti_bayar', 'public');
        }
        FormKkn::create($validated);
        Alert::success('Berhasil', 'Data KKN mahasiswa berhasil ditambahkan');
        return redirect()->route('dashboard.form-kkn');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = 'DETAIL DATA KKN MAHASISWA';
        $kkns = Kkn::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        $data = FormKkn::where('id',$id)->first();
        return view('admin.form-kkn.create-update-show',compact('judul','kkns','mahasiswas','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $judul = 'UBAH DATA KKN MAHASISWA';
        $kkns = Kkn::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        $data = FormKkn::where('id',$id)->first();
        return view('admin.form-kkn.create-update-show',compact('judul','kkns','mahasiswas','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
          $form = FormKkn::findOrFail($id);

    $validated = $request->validate([
        'tanggal'        => 'required|date',
        'kem_studi'      => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        'bukti_bayar'    => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        'kkn_id'         => 'required|integer',
        'status'         => 'required',
        'mahasiswa_id'   => 'required|integer',
        'keterangan'     => 'nullable|string',
    ]);
    // === Update file kem_studi ===
    if ($request->hasFile('kem_studi')) {
        // Hapus file lama jika ada
        if ($form->kem_studi && \Storage::disk('public')->exists($form->kem_studi)) {
            \Storage::disk('public')->delete($form->kem_studi);
        }
        // Upload file baru
        $validated['kem_studi'] = $request->file('kem_studi')->store('kkn/kem_studi', 'public');
    }
    // === Update file bukti_bayar ===
    if ($request->hasFile('bukti_bayar')) {
        // Hapus file lama
        if ($form->bukti_bayar && \Storage::disk('public')->exists($form->bukti_bayar)) {
            \Storage::disk('public')->delete($form->bukti_bayar);
        }
        // Upload file baru
        $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('kkn/bukti_bayar', 'public');
    }
    $form->update($validated);
    Alert::success('Berhasil', 'Data KKN mahasiswa berhasil diperbarui');
    return redirect()->route('dashboard.form-kkn');
    }

    // Hapus data
    public function destroy($id)
    {
        $form = FormKkn::findOrFail($id);

    // Hapus file kem_studi jika ada
    if ($form->kem_studi && \Storage::disk('public')->exists($form->kem_studi)) {
        \Storage::disk('public')->delete($form->kem_studi);
    }

    // Hapus file bukti_bayar jika ada
    if ($form->bukti_bayar && \Storage::disk('public')->exists($form->bukti_bayar)) {
        \Storage::disk('public')->delete($form->bukti_bayar);
    }

    // Hapus data
    $form->delete();
    Alert::success('Berhasil', 'Data KKN mahasiswa berhasil dihapus');
    return redirect()->route('dashboard.form-kkn');
    }
}
