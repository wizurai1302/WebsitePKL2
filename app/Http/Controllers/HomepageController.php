<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPerusahaan = DB::table('perusahaans')->count();
        $semingguYangLalu = Carbon::now()->subDays(7);
        $totalSiswaBaru = Siswa::where('created_at', '>=', $semingguYangLalu)->count();
        $totalSiswa = DB::table('siswas')->count();
        $totalGuru = DB::table('gurus')->count();

        $image = auth()->user()->image ?? 'user/profile.png';

        // dd($image);
        // $perusahaan = Perusahaan::all();
        return view('homepage.header', compact('totalPerusahaan', 'totalSiswa', 'totalSiswaBaru', 'totalGuru', 'image'));
    }

    public function perusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('homepage.home.perusahaan', compact('perusahaan'));
    }

    public function jurnal()
    {
        return view('homepage.home.home');
    }
    public function tes()
    {
        return view('Tes.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
    }

    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
