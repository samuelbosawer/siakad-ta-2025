<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
      // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Mahasiswa::with('user')
        ->whereNotNull('nama_depan')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                // Cari di kolom mahasiswa
                $q->where('nama_depan', 'LIKE', '%' . $s . '%')
                ->orWhere('nama_belakang', 'LIKE', '%' . $s . '%')
                ->orWhere('no_hp', 'LIKE', '%' . $s . '%');

                // Cari di relasi User (misal email atau name)
                $q->orWhereHas('user', function ($u) use ($s) {
                        $u->where('nama', 'LIKE', '%' . $s . '%')
                        ->orWhere('email', 'LIKE', '%' . $s . '%');
                    });
                });
            })
            ->orderBy('nama_depan')
            ->paginate(7);
        return view('admin.mahasiswa.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.mahasiswa.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        // 1. Validasi
    $validated = $request->validate([
        'nama_depan' => 'required|string|max:100',
        'nama_belakang' => 'nullable|string|max:100',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'no_hp' => 'required|string|max:20',
        'jenis_kelamin' => 'required',
        'alamat' => 'required|string',
        'semester' => 'required|numeric',

        // Validasi untuk user
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed', // gunakan password_confirmation
    ]);

    // 2. Simpan ke table users

    $user = User::create([
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'nama' => $validated['nama_depan'],
    ]);

    // 3. Simpan ke tabel profil (sesuaikan nama modelnya)
    $profil = Mahasiswa::create([
        'user_id' => $user->id,
        'nama_depan' => $validated['nama_depan'],
        'nama_belakang' => $validated['nama_belakang'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'no_hp' => $validated['no_hp'],
        'jenis_kelamin' => $validated['jenis_kelamin'],
        'alamat' => $validated['alamat'],
        'semester' => $validated['semester'],
    ]);

    return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         return view('admin.crud_tamplate.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
         return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}
