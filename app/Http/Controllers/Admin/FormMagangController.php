<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormMagang;
use App\Models\Magang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FormMagangController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = FormMagang::with(['magang', 'mahasiswa'])
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    $q->where('tanggal', 'LIKE', "%$s%")
                        ->orWhere('ket', 'LIKE', "%$s%")
                        ->orWhere('status', 'LIKE', "%$s%");

                    // cari berdasarkan data Magang
                    $q->orWhereHas('magang', function ($m) use ($s) {
                        $m->where('nama_magang', 'LIKE', "%$s%")
                            ->orWhere('semester', 'LIKE', "%$s%");
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
        return view('admin.form-magang.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        $magangs = Magang::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        return view('admin.form-magang.create-update-show', compact('magangs', 'mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required',
            'magang_id' => 'required',
            'mahasiswa_id' => 'required',
            'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $berkasPath = null;

        if ($request->hasFile('berkas')) {
            $berkasPath = $request->file('berkas')->store('magang/berkas', 'public');
        }

        FormMagang::create([
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
            'status' => $request->status,
            'ket' => $request->ket,
            'magang_id' => $request->magang_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'berkas' => $berkasPath,
        ]);

        Alert::success('Berhasil', 'Data magang berhasil ditambahkan');
        return redirect()->route('dashboard.form-magang');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $magangs = Magang::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        $judul = 'DETAIL DATA MAGANG MAHASISWA';
        $data = FormMagang::where('id', $id)->first();
        return view('admin.form-magang.create-update-show', compact('magangs', 'mahasiswas', 'data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $magangs = Magang::orderBy('id', 'desc')->get();
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();
        $judul = 'UBAH DATA MAGANG MAHASISWA';
        $data = FormMagang::where('id', $id)->first();
        return view('admin.form-magang.create-update-show', compact('magangs', 'mahasiswas', 'data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = FormMagang::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required',
            'magang_id' => 'required',
            'mahasiswa_id' => 'required',
            'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $berkasPath = $data->berkas;

        if ($request->hasFile('berkas')) {

            // hapus file lama
            if ($data->berkas && Storage::disk('public')->exists($data->berkas)) {
                Storage::disk('public')->delete($data->berkas);
            }

            // simpan file baru
            $berkasPath = $request->file('berkas')->store('magang/berkas', 'public');
        }

        $data->update([
            'tanggal' => $request->tanggal,
            'ket' => $request->ket,
            'status' => $request->status,
            'magang_id' => $request->magang_id,
            'ket' => $request->ket,
            'mahasiswa_id' => $request->mahasiswa_id,
            'berkas' => $berkasPath,
        ]);

        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.form-magang');
    }

    public function destroy($id)
    {
        $data = FormMagang::findOrFail($id);

        if ($data->berkas && Storage::disk('public')->exists($data->berkas)) {
            Storage::disk('public')->delete($data->berkas);
        }

        $data->delete();
        Alert::success('Berhasil', 'Data magang berhasil ditambahkan');
                return redirect()->route('dashboard.form-magang');

    }
}
