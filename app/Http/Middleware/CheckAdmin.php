<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifikasi role 'admin' pada session
        $user = $request->session()->get('role');
        if ( $user === 'admin') {
            return $next($request);
        }

        // Jika tidak memenuhi verifikasi, arahkan pengguna ke halaman lain
        return redirect('/');
    }
}