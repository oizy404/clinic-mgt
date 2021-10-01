<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageAdminAccess
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
        $rank = $request->session()->get('rank');

        if($rank == "doctor"){
            return redirect()->route("doctor-home");
        }
        else if($rank == "supervisor"){
            return redirect()->route("supervisor-home");
        }
        return $next($request);
    }
}
