<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
         $datas = Dosen::with('user')
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
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.dosen.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.dosen.create-update-show');
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
    $profil = Dosen::create([
        'user_id' => $user->id,
        'nama_depan' => $validated['nama_depan'],
        'nama_belakang' => $validated['nama_belakang'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'no_hp' => $validated['no_hp'],
        'jenis_kelamin' => $validated['jenis_kelamin'],
        'alamat' => $validated['alamat'],
    ]);
    Alert::success('Berhasil', 'Tambah data berhasil');
    return redirect()->route('dashboard.dosen');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
          $data = Dosen::where('id',$id)->first();
          $judul = 'DETAIL DATA DOSEN';
          return view('admin.dosen.create-update-show', compact('data','judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
           $data = Dosen::where('id',$id)->first();
          $judul = 'UBAH DATA DOSEN';
          return view('admin.dosen.create-update-show', compact('data','judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
         // Ambil data mahasiswa dan user
        $mahasiswa = Dosen::findOrFail($id);
        $user = User::findOrFail($mahasiswa->user_id);

        // 1. Validasi
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'nullable|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string',


            // Password opsional
            'password' => 'nullable|min:6|confirmed',
        ]);


        // Jika password diisi maka update
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        // Update nama
        $user->nama = $validated['nama_depan'];

        $user->save();

        // 3. Update tabel profil (Mahasiswa)
        $mahasiswa->update([
            'nama_depan' => $validated['nama_depan'],
            'nama_belakang' => $validated['nama_belakang'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'no_hp' => $validated['no_hp'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
        ]);

        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.dosen');
    }

    // Hapus data
    public function destroy($id)
    {
         $dosen = Dosen::findOrFail($id);

        // Hapus user terkait
        $user = User::find($dosen->user_id);
        if ($user) {
            $user->delete();
        }

        // Hapus data dosen
        $dosen->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.dosen');
    }
}
