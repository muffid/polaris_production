<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isLogin
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
        if ($request->session()->get('role')==='Administrator') {
            return redirect()->route('dashboard_admin');
        } else if ($request->session()->get('role')==='Desainer') {
            return redirect()->route('dashboard_desainer');
        }else if ($request->session()->get('role')==='Setting'){
            return redirect()->route('dashboard_setting');
        }else if ($request->session()->get('role')==='Operator'){
            return redirect()->route('dashboard_operator');
        }else{
            return $next($request);
        }
    }
}
