<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect()->route('login.user')->withErrors(['message' => 'Please login first.']);
        }

        return $next($request);
    }
}
