<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $guruQuery = Guru::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $guruQuery->where(function ($query) use ($searchTerm) {
                $query->where("name", 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere("nuptk", 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $guru = $guruQuery->latest()->paginate(10);

        return view('UserManajement.guru.index', compact('guru'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $guru = Guru::findOrFail($id);
        return view('UserManajement.guru.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nuptk' => 'required|unique:gurus,nuptk|string|max:255',
            // Add validation rules for other fields
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nuptk = $request->nuptk;
        $user->password = Hash::make($request->password);
        $user->role = 'guru';
        $user->save();
        // $user->verified = true;
        // $user->email_verified_at = now(); // Use the now() function to get the current timestamp
        // if (!$user->save()) {
        //     dd($user->getErrors());
        // }

        $guru = new Guru();
        $guru->name = $request->input('name');
        $guru->nuptk = $request->input('nuptk');
        $guru->image   = 'user/user.png';
        $guru->user_id = $user->id;
        $guru->save();

        return redirect('/guru/index')->withSuccess('Guru Berhasil Ditambahkan');
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
        $guru = Guru::find($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255|unique:gurus,nuptk,' . $id,
            'password' => 'nullable|string|min:8', // Menambahkan aturan validasi password
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $guru = Guru::find($id);

        if (!$guru) {
            return redirect('/guru')->with('error', 'Guru not found');
        }

        $guru->name = $request->input('name');
        $guru->nuptk = $request->input('nuptk');
        $guru->save();

        // Mengupdate data di tabel 'users'
        $user = User::find($guru->user_id);

        if ($user) {
            $user->name = $request->input('name');
            $user->nuptk = $request->input('nuptk');
            if ($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();
        }


        return redirect('/guru/index')->with('success', 'Guru and User updated successfully');
    }


    public function destroy($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return redirect('/guru/index')->with('error', 'Guru not found');
        }

        // Check if a user is associated with this Guru
        $user = User::find($guru->user_id);

        if ($user) {
            // Delete the Guru record first
            $guru->delete();

            // Then, delete the associated User record
            $user->delete();
        }
        return redirect('/guru/index')->with('success', 'Guru Berhasil Dihapus');
    }
}
