<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PatientProfile;

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
		if(Auth::attempt($credentials)){
			if(Auth::user()->rank == 'patient'){
				return redirect()->route('patient-dashboard');
			}
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