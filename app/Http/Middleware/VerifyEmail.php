<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->is_email_verified) {
            auth()->logout();
            return redirect()->route('formlogin')
                    ->with('message', 'Anda perlu mengkonfirmasi akun Anda. Kami telah mengirimkan kode aktivasi, silakan periksa email Anda.');
        }
        return $next($request);
    }
}
