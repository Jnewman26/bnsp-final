<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register-member');
    }

    public function register(Request $request)
    {
        $request->validate([
            'member_id' => 'required|unique:member,member_id|max:255',
            'member_name' => 'required|string|max:255',
            'member_email' => 'required|email|unique:member,member_email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Insert data ke tabel member
        DB::table('member')->insert([
            'member_id' => $request->member_id,
            'member_name' => $request->member_name,
            'member_email' => $request->member_email,
            'member_password' => Hash::make($request->password),
            'member_status' => 1,
            'member_created_at' => now(),
            'member_updated_at' => now(),
        ]);

        return redirect()->route('login.member')->with('success', 'Registration successful. Please login.');
    }
}
