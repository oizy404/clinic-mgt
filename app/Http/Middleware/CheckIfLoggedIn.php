<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfLoggedIn{

    public function handle(Request $request, Closure $next)
    {

        $rank = $request->session()->get('rank');       // gets the value of the sesseion 'rank'
        
        if(Auth::check() && $rank == "admin"){          // checks if user is logged in and session rank is admin
            return redirect()->route("admin-home");
        }
        else if(Auth::check() && $rank == "doctor"){     // checks if user is logged in and session rank is staff
            return redirect()->route("doctor-home");
        }
        else if(Auth::check() && $rank == "supervisor"){
            return redirect()->route("supervisor-home");
        }

        return $next($request);
    }
}