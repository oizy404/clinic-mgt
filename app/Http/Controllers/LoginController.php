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
			if($request->session()->put('rank', $rank)=='clinicstaff'){// put session data named 'rank'. Which value is either 'admin',
				return redirect()->route('admin-home');
			}
			if($request->session()->put('rank', $rank)=='doctor'){// put session data named 'rank'. Which value is either 'doctor',
				return redirect()->route('appointments');
			} 
			// if($request->session()->put('rank', $rank)=='supervisor'){// put session data named 'rank'. Which value is either 'supervisor',
			// 	return redirect()->route('health-data');
			// }     
            else{
				return back()->withErrors([
					"Invalid Login"
				]);
			}
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