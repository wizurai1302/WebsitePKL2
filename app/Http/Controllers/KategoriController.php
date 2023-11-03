<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoriQuery = Kategori::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $kategoriQuery->where(function ($query) use ($searchTerm) {
                $query->where("nama_kategori", 'LIKE', '%' . $searchTerm . '%');
                // ->orWhere("nuptk", 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $kategori = $kategoriQuery->latest()->paginate(10);

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'Nama Kategori Harus Di isi'
        ]);
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect('/kategori/index')->with('success', 'Kategori berhasil di buat');
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
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi'
        ]);


        $kategori = Kategori::where('id', $request->id)->first();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect('/kategori/index')->with('success', 'Kategori berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil di hapus');
    }
}
