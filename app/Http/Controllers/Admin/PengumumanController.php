<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Pengumuman::when($request->s, function ($query) use ($request) {

            $s = $request->s;

            $query->where(function ($q) use ($s) {
                // Cari di kolom Pengumuman
                $q->where('judul', 'LIKE', '%' . $s . '%')
                    ->orWhere('tanggal', 'LIKE', '%' . $s . '%')
                    ->orWhere('deskripsi', 'LIKE', '%' . $s . '%');
            });
        })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.pengumuman.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.pengumuman.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'      => 'required|string|max:255',
            'tanggal'    => 'required|date',
            'deskripsi'  => 'required|string',
            'gambar'     => 'required|file|mimes:jpg,jpeg,png,webp'
        ]);

        // Upload file gambar
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('pengumuman/gambar', 'public');
        }

        Pengumuman::create($validated);

        Alert::success('Berhasil', 'Pengumuman berhasil ditambahkan');

        return redirect()->route('dashboard.pengumuman');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Pengumuman::where('id', $id)->first();
        $judul = 'DETAIL PENGUMUMAN';
        return view('admin.pengumuman.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = Pengumuman::where('id', $id)->first();
        $judul = 'UBAH PENGUMUMAN';
        return view('admin.pengumuman.create-update-show', compact('data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $peng = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul'      => 'required|string|max:255',
            'tanggal'    => 'nullable|date',
            'deskripsi'  => 'nullable|string',
            'gambar'     => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf'
        ]);

        // Jika ada upload file baru
        if ($request->hasFile('gambar')) {

            // Hapus file lama
            if ($peng->gambar && Storage::disk('public')->exists($peng->gambar)) {
                Storage::disk('public')->delete($peng->gambar);
            }

            // Upload file baru
            $validated['gambar'] = $request->file('gambar')->store('pengumuman/gambar', 'public');
        }

        $peng->update($validated);

        Alert::success('Berhasil', 'Pengumuman berhasil diperbarui');

        return redirect()->route('dashboard.pengumuman');
    }

    // Hapus data
    public function destroy($id)
    {
        $peng = Pengumuman::findOrFail($id);

        // Hapus file gambar
        if ($peng->gambar && Storage::disk('public')->exists($peng->gambar)) {
            Storage::disk('public')->delete($peng->gambar);
        }

        $peng->delete();

        Alert::success('Berhasil', 'Pengumuman berhasil dihapus');

        return redirect()->route('dashboard.pengumuman');
    }
}
