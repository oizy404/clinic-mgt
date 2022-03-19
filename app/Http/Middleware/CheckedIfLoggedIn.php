<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckedIfLoggedIn
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
        $rank = $request->session()->get('rank');       // gets the value of the sesseion 'rank'
        
        if(Auth::check() && $rank == "clinicstaff"){          // checks if user is logged in and session rank is admin
            return redirect()->route("admin-home");
        }
        else if(Auth::check() && $rank == "doctor"){     // checks if user is logged in and session rank is staff
            return redirect()->route("appointments");
        }
        // else if(Auth::check() && $rank == "supervisor"){
        //     return redirect()->route("health-data");
        // }
        else if(Auth::check() && $rank == "patient"){
            return redirect()->route("patient-dashboard");
        }

        return $next($request);
    }
}
