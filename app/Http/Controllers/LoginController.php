<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\PatientProfile;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(Request $request){

		$dt = Carbon::now();
		$todayDate = $dt->toDayDateTimeString();

		$user_name = $request->username;

		$activityLog = [
			'user_name' => $user_name,
			'description' => 'Log In',
			'date_time' => $todayDate,
		];

        $credentials = $request->only('username', 'password');
        $users = DB::table('users')->where('username', $request->username)->get("rank"); // gets data from table users where username match
        $rank;

        foreach($users as $user){
        	$rank = $user->rank;    // get the rank of the username. Either 'admin' , 'doctor' , 'supervisor'

        }

        if (Auth::attempt($credentials)){
			DB::table('activity_logs')->insert($activityLog);
			if($request->session()->put('rank', $rank)=='clinicstaff'){// put session data named 'rank'. Which value is either 'clinicstaff',
				return redirect()->route('clinicstaff-dashboard');
			}
			if($request->session()->put('rank', $rank)=='doctor'){// put session data named 'rank'. Which value is either 'doctor',
				return redirect()->route('appointments');
			}  
			if($request->session()->put('rank', $rank)=='patient'){// put session data named 'rank'. Which value is either 'patient',
				return redirect()->route('appointments');
			}     
            else{
				Toastr::error('Incorrect Username or Password','Invalid Login');
				return redirect()->back();
			}
        }

		Toastr::error('Incorrect Username or Password!','Error');
		
		return redirect()->back();
    }
}