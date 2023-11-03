<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.auth');
    }
    public function login(Request $request)
    {
        Session::flash('nisn_name', $request->nisn_name);

        $request->validate(
            [
                'nisn_name' => 'required', // Menggunakan nisn_name sebagai nama input
                'password' => 'required',
            ],
            [
                'nisn_name.required' => 'Nisn harus diisi',
                'password.required' => 'Password harus diisi'
            ]
        );

        $nisnName = $request->nisn_name;
        $password = $request->password;

        // Anda perlu menentukan apakah nilai adalah Nisn atau Name
        $isNisn = is_numeric($nisnName); // Mengecek apakah nilai numerik

        // Jika nilai adalah Nisn, Anda bisa mencocokkannya berdasarkan kolom 'nisn'
        // Jika bukan, Anda bisa mencocokkannya berdasarkan kolom 'name'
        $fieldToCheck = $isNisn ? 'nisn' : 'name';

        $infoLogin = [
            $fieldToCheck => $nisnName,
            'password' => $password,
        ];

        if (Auth::attempt($infoLogin)) {
            // kalau authenticate berhasil
            return redirect('/admin')->with('success', 'Berhasil Login');
        } else {
            // kalau authenticate gagal
            return redirect('/login')->with('error', 'Nisn dan Password tidak valid');
        }
    }


    public function registration()
    {
        return view('Auth.auth'); // Create a registration form view if not already done.
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name         = $request->name;
        $user->nisn         = $request->nisn;
        $user->image        = $request->image;
        $user->password     = Hash::make($request->password);
        $user->role    = 'Siswa';
        $user->save();

        //create student
        $student            = new Siswa();
        $student->name      = $request->name;
        $student->nisn      = $request->nisn;
        $student->user_id   = $user->id;
        $student->image   = $request->image;
        $student->save();

        // You can also automatically log in the user after registration if you want.

        return redirect('/login')->with('success', 'Registration successful. You can now log in.');
    }

    public function logout(Request $request)
    {
        // Log out the currently authenticated user
        Auth::logout();

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate a new CSRF token for the session to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect the user to the home page after successful logout
        return redirect('/')->withSuccess('Berhasil Logout');
    }
}
