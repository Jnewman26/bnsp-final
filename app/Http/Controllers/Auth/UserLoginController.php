<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-user');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil data user dari tabel
        $user = DB::table('user')->where('username', $request->username)->first();

        // Validasi username dan password
        if ($user && Hash::check($request->password, $user->user_password)) {
            // Simpan sesi login
            session(['user_id' => $user->user_id, 'username' => $user->username]);

            return redirect()->to('/')->with('success', 'Hello ' . $request->username);
        }

        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.user');
    }
}
