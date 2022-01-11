<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        $users = DB::table('users')->where('username', $request->username)->get("rank"); // gets data from table users where username match

        $rank;

        foreach($users as $user){
        	$rank = $user->rank;    // get the rank of the username. Either 'admin' , 'doctor' , 'supervisor'

        }

        if (Auth::attempt($credentials)){
        	$request->session()->put('rank', $rank);    // put session data named 'rank'. Which value is either 'admin', 'doctor' , 'supervisor'
            return redirect()->route('admin-home');
        }

        return back()->withErrors([
            "Invalid Login"
        ]);
    }

    public function loginDoctor(Request $request){
    	$credentials = $request->only('username', 'password');
    	$users = DB::table('users')->where('username', $request->username)->get("rank");

    	$rank;

    	foreach($users as $user){
    	  	$rank = $user->rank;
    	}
    	if (Auth::attempt($credentials)) {
        	$request->session()->put('rank', $rank);
        	return redirect()->route('student-consultation-record');
		}
        return back()->withErrors([
            "Invalid Login"
		]);
	}
	
	public function loginSupervisor(Request $request){
		$credentials = $request->only('username', 'password');
		$users = DB::table('users')->where('username', $request->username)->get("rank");

		$rank;

		foreach($users as $user){
		    $rank = $user->rank;
		}
		if (Auth::attempt($credentials)) {
		    $request->session()->put('rank', $rank);
		    return redirect()->route('medical-supplies-inventory');
		}

	    return back()->withErrors([
	        "Invalid Login"

		]);        
 	}
	public function loginPatient(Request $request){
		$credentials = $request->only('username', 'password');
		$users = DB::table('users')->where('username', $request->username)->get("rank");

		$rank;
		
		foreach($users as $user){
		    $rank = $user->rank;
		}
		if (Auth::attempt($credentials)) {
		    $request->session()->put('rank', $rank);
		    return redirect()->route('patient-dashboard');
		}

	    return back()->withErrors([
	        "Invalid Login"

		]);  
	}
	public function registerPatient(Request $request){
		$credentials = new User();
		$credentials->username = $request->username;
		$password = $request->password;
		$credentials->password = Hash::make($password);
		$credentials->rank = 'patient';

        $credentials->save();
		return back()->with('You are now registered!');
	}
}