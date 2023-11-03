<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $perusahaan = Perusahaan::all();
        return view('perusahaan.index', compact('kategori', 'perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $kategori = Kategori::all();
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.create', compact('kategori', 'perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data masukan dari form
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Pindahkan foto yang diunggah ke folder 'images'
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/', $name);

            // Buat catatan perusahaan baru di tabel 'perusahaan'
            Perusahaan::create([
                'nama' => $request->nama,
                'lokasi' => $request->lokasi, // Make sure 'lokasi' is defined in your form
                'deskripsi' => $request->deskripsi,
                'image' => $name,
                'jurusan' => $request->jurusan, // Make sure 'jurusan' is defined in your form
                'alamat' => $request->alamat,
            ]);

            // Alihkan ke tampilan 'homeuser.card' dengan pesan sukses
            return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dibuat.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan = Perusahaan::find($id);
        return view('homepage.home.show', compact('perusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $perusahaan)
    {
        // Temukan catatan perusahaan dengan ID $perusahaan yang diberikan
        $perusahaan = Perusahaan::findOrFail($perusahaan);

        // Initialize the $name variable
        $name = null;

        // If a new photo is uploaded, move it to the 'images' folder and update the 'image' field
        if ($request->hasFile('image')) {
            // Get the original name of the uploaded file
            $name = $request->file('image')->getClientOriginalName();

            // Move the uploaded image to the 'images' folder
            $request->file('image')->move('images/', $name);

            // Update the 'image' field with the new file name
            $perusahaan->image = $name;
        }

        // Update other fields with values from the form
        $perusahaan->nama = $request->nama;
        $perusahaan->lokasi = $request->lokasi;
        $perusahaan->deskripsi = $request->deskripsi;
        $perusahaan->jurusan = $request->jurusan;
        $perusahaan->alamat = $request->alamat;

        // Save the changes to the database
        $perusahaan->save();

        // Redirect back to the 'admin.dataperusahaan' view with a success message
        return back()->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return back()->with('success', 'Perusahaan berhasil dihapus');
    }
}
