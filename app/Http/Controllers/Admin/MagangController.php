<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Magang;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
      // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Magang::with('dosen')
        ->whereNotNull('nama_magang')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                // Cari di kolom mahasiswa
                $q->where('nama_magang', 'LIKE', '%' . $s . '%')
                ->orWhere('tanggal', 'LIKE', '%' . $s . '%')
                ->orWhere('ket', 'LIKE', '%' . $s . '%')
                ->orWhere('status', 'LIKE', '%' . $s . '%')
                ->orWhere('semester', 'LIKE', '%' . $s . '%');

                // Cari di relasi User (misal email atau name)
                $q->orWhereHas('dosen', function ($u) use ($s) {
                        $u->where('nama_depan', 'LIKE', '%' . $s . '%')
                        ->orWhere('nama_belakang', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%');
                    });
                });
            })
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.magang.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $dosens = Dosen::get();
        return view('admin.magang.create-update-show',compact('dosens'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nama_magang' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'semester'    => 'required|string|max:50',
            'sk'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'dosen_id'    => 'required|integer',
            'status'         => 'required|string',
            'ket'         => 'nullable|string',
        ]);

        // Upload file SK
        if ($request->hasFile('sk')) {
            $validated['sk'] = $request->file('sk')->store('magang/sk', 'public');
        }

        Magang::create($validated);

        Alert::success('Berhasil', 'Data magang berhasil ditambahkan');
        return redirect()->route('dashboard.magang');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         $dosens = Dosen::get();
         $data = Magang::where('id',$id)->first();
         $judul = 'DETAIL DATA MAGANG';
        return view('admin.magang.create-update-show',compact('dosens','data','judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $dosens = Dosen::get();
         $data = Magang::where('id',$id)->first();
         $judul = 'UBAH DATA MAGANG';
        return view('admin.magang.create-update-show',compact('dosens','data','judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
       $data = Magang::findOrFail($id);

        $validated = $request->validate([
            'nama_magang' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'semester'    => 'required|string|max:50',
            'sk'          => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
            'dosen_id'    => 'required|integer',
            'status'         => 'required|string',
            'ket'         => 'nullable|string',
        ]);

        // Jika ada upload file baru
        if ($request->hasFile('sk')) {

            // Hapus file lama
            if (!empty($data->sk) && Storage::disk('public')->exists($data->sk)) {
                Storage::disk('public')->delete($data->sk);
            }

            // Upload file baru
            $validated['sk'] = $request->file('sk')->store('magang/sk', 'public');
        } else {
            // Jika tidak upload baru, tetap pakai file lama
            $validated['sk'] = $data->sk;
        }

        $data->update($validated);

        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.magang');
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}
