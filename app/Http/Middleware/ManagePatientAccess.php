<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagePatientAccess
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
        
        if($rank == "admin"){
            return redirect()->route("admin-home");
        }
        else if($rank == "doctor"){
            return redirect()->route("student-consultation-record");
        }
        else if($rank == "supervisor"){
            return redirect()->route("medical-supplies-inventory");
        }
        return $next($request);
    }
}
