<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
class ProdiController extends Controller
{
     // Tampilkan semua data
    public function index()
    {
        $data = Prodi::where('id',1)->first();
        return view('admin.prodi.edit',compact('data'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        //
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         return view('admin.crud_tamplate.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = Prodi::where('id',1)->first();
        return view('admin.prodi.edit',compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        // Validasi input
    $validated = $request->validate([
        'nama'     => 'required|string|max:255',
        'visi'     => 'required|string',
        'misi'     => 'required|string',
        'sejarah'  => 'required|string',
        'struktur' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Ambil data lama
    $prodi = Prodi::findOrFail($id);

    // Update field biasa
    $prodi->nama    = $validated['nama'];
    $prodi->visi    = $validated['visi'];
    $prodi->misi    = $validated['misi'];
    $prodi->sejarah = $validated['sejarah'];

    // Upload file jika ada file baru
    if ($request->hasFile('struktur')) {

        // Hapus file lama jika ada
        if ($prodi->struktur && file_exists(public_path($prodi->struktur))) {
            unlink(public_path($prodi->struktur));
        }

        $file      = $request->file('struktur');
        $file_name = 'struktur_'.time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/struktur'), $file_name);

        // Simpan path file
        $prodi->struktur = 'uploads/struktur/' . $file_name;
    }

    $prodi->save();
    return redirect()
        ->route('dashboard.prodi')
        ->with('success', 'Data Program Studi berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}
