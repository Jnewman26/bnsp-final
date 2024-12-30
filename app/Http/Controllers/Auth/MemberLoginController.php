<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-member');
    }

    public function login(Request $request)
    {
        $request->validate([
            'member_email' => 'required|email',
            'password' => 'required',
        ]);

        $member = DB::table('member')->where('member_email', $request->member_email)->first();

        if ($member && Hash::check($request->password, $member->member_password)) {
            session(['member_id' => $member->member_id, 'member_name' => $member->member_name, 'member_status' => $member->member_status] );

            return redirect()->to('/discoveryMember')->with('success', 'Hello ' . $member->member_name);
        }

        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    // Method untuk logout member
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login.member')->with('success', 'You have logged out successfully.');
    }
}
