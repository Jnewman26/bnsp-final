<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMember
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('member_id')) {
            return redirect()->route('login.member')->withErrors(['message' => 'Please login first.']);
        }

        return $next($request);
    }
}
