<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilePerusahaan;

class ProfilePerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $profilePerusahaanQuery = ProfilePerusahaan::query();

        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $profilePerusahaanQuery->where(function ($query) use ($searchTerm) {
                $query->where("nama", 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere("lokasi", 'LIKE', '%' . $searchTerm . '%', 'COLLATE utf8_general_ci')
                    ->orWhere("phone", 'LIKE', '%' . $searchTerm . '%', 'COLLATE utf8_general_ci')
                    ->orWhere("email", 'LIKE', '%' . $searchTerm . '%', 'COLLATE utf8_general_ci');
            });
        }

        $profilePerusahaan = $profilePerusahaanQuery->latest()->paginate(10);

        return view('profilePerusahaan.index', compact('profilePerusahaan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profilePerusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'lokasi' => 'required',

        ]);


        // Buat catatan perusahaan baru di tabel 'perusahaan'
        ProfilePerusahaan::create([
            'nama' => $request->nama,
            'phone' => $request->phone, // Make sure 'lokasi' is defined in your form
            'email' => $request->email,
            'lokasi' => $request->lokasi,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        ]);

        // Alihkan ke tampilan 'homeuser.card' dengan pesan sukses
        return redirect()->route('profile.perusahaan')->with('success', 'Profile Perusahaan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profilePerusahaan = ProfilePerusahaan::findOrFail($id);
        return view('profilePerusahaan.edit', compact('profilePerusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'lokasi' => 'required',

        ]);


        // Buat catatan perusahaan baru di tabel 'perusahaan'
        ProfilePerusahaan::create([
            'nama' => $request->nama,
            'phone' => $request->phone, // Make sure 'lokasi' is defined in your form
            'email' => $request->email,
            'lokasi' => $request->lokasi,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
