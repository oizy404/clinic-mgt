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
            return redirect()->route("students-consultation-record");
        }
        else if($rank == "supervisor"){
            return redirect()->route("medical-supplies-inventory");
        }
        else if($rank == "patient"){
            return redirect()->route("student-health-data");
        }
        return $next($request);
    }
}
