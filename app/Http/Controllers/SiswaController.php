<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswaQuery = Siswa::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $siswaQuery->where(function ($query) use ($searchTerm) {
                $query->where("name", 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere("nisn", 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $siswa = $siswaQuery->latest()->paginate(10);

        return view('UserManajement.siswa.index', compact('siswa'));
    }

    public function create($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('UserManajement.siswa.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nisn' => 'required|unique:siswas,nuptk|string|max:255',
            // Add validation rules for other fields
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nisn = $request->nisn;
        $user->password = Hash::make($request->password);
        $user->role = 'Siswa';
        $user->save();


        $siswa = new Siswa();
        $siswa->name = $request->input('name');
        $siswa->nisn = $request->input('nisn');
        $siswa->image   = 'user/user.png';
        $siswa->user_id = $user->id;
        $siswa->save();

        return redirect('/siswa/index')->withSuccess('Siswa Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:siswas,nisn,' . $id,
            'password' => 'nullable|string|min:8', // Menambahkan aturan validasi password
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect('/siswa/index')->with('error', 'Siswa not found');
        }

        $siswa->name = $request->input('name');
        $siswa->nisn = $request->input('nisn');
        $siswa->save();

        // Mengupdate data di tabel 'users'
        $user = User::find($siswa->user_id);

        if ($user) {
            $user->name = $request->input('name');
            $user->nisn = $request->input('nisn');
            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();
        }


        return redirect('/siswa/index')->with('success', 'Akun Siswa Berhasil Diubah');
    }


    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect('/siswa/index')->with('error', 'Siswa not found');
        }

        // Check if a user is associated with this Siswa
        $user = User::find($siswa->user_id);

        if ($user) {
            // Delete the Siswa record first
            $siswa->delete();

            // Then, delete the associated User record
            $user->delete();
        }
        return redirect('/siswa/index')->with('success', 'Siswa Berhasil Dihapus');
    }
}
