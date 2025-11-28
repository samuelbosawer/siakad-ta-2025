<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kkn;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Magang;
use Illuminate\Support\Facades\Storage;

class KknController extends Controller
{
      // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Kkn::whereNotNull('nama_kkn')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                // Cari di kolom mahasiswa
                $q->where('nama_kkn', 'LIKE', '%' . $s . '%')
                ->orWhere('tahun', 'LIKE', '%' . $s . '%')
                ->orWhere('status', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.kkn.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.kkn.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {

          $validated = $request->validate([
            'nama_kkn' => 'required|max:255',
            'tahun'     => 'required',
            'sk'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'status'         => 'required|string',
        ]);

        // Upload file SK
        if ($request->hasFile('sk')) {
            $validated['sk'] = $request->file('sk')->store('kkn/sk', 'public');
        }

        Kkn::create($validated);

        Alert::success('Berhasil', 'Data KKN berhasil ditambahkan');
        return redirect()->route('dashboard.kkn');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = 'DATAIL DATA KKN';
        $data =   Kkn::where('id',$id)->first();
         return view('admin.kkn.create-update-show', compact('judul','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
         $judul = 'UBAH DATA KKN';
        $data =   Kkn::where('id',$id)->first();
         return view('admin.kkn.create-update-show', compact('judul','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = Kkn::findOrFail($id);
        $validated = $request->validate([
            'nama_kkn' => 'required|string|max:255',
            'tahun'     => 'required',
            'sk'          => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'status'      => 'required|string',
        ]);

        // Jika ada upload file baru
        if ($request->hasFile('sk')) {

            // Hapus file lama
            if (!empty($data->sk) && Storage::disk('public')->exists($data->sk)) {
                Storage::disk('public')->delete($data->sk);
            }

            // Upload file baru
            $validated['sk'] = $request->file('sk')->store('kkn/sk', 'public');
        } else {
            // Jika tidak upload baru, tetap pakai file lama
            $validated['sk'] = $data->sk;
        }

        $data->update($validated);
        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.kkn');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = Kkn::findOrFail($id);

        // Hapus file SK jika ada
        if (!empty($data->sk) && Storage::disk('public')->exists($data->sk)) {
            Storage::disk('public')->delete($data->sk);
        }

        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.kkn');
    }
}
