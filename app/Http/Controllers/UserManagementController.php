<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Imports\DataImportExcel;
use App\Models\userActivityLog;
use App\Models\ActivityLog;
use App\Models\User;

use Carbon\Carbon;

class UserManagementController extends Controller
{

    public function import(Request $request){

        Excel::import(new MultipleUserImport, $request->file);
        return back()->with('Records are imported successfully');
    }

    public function index(){                    //display all users
        $activityLogs = User::all();

        return view('pages.clinic_staff.patient-logs.patientLogs-page', compact(
            'activityLogs',
        ));
    }

    public function insert(Request $request){   // create new user

        $activityLog = new User();        
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog->username = $request->username;
        $activityLog->email = $request->email;
        $activityLog->phone_number = $request->phone_number;
        $password = $request->password;
        $activityLog->password = Hash::make($password);
        $activityLog->rank = 'patient';
        $activityLog->archived = 1;
        $activityLog->date_time = $todayDate;

        $activityLog->save();

        return redirect()->back();
    }

    public function edit($id){

        $activityLog = User::find($id);

        return view('pages.clinic_staff.patient-logs.view-user-details')->with("activityLog", $activityLog);
    }

    public function update(Request $request, $id){ // Update user details

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = User::find($id);

        $activityLog->username = $request->username;
        $activityLog->email = $request->email;
        $activityLog->phone_number = $request->phone_number;
        $activityLog->status = $request->status;
        $activityLog->rank = $request->rank;
        $activityLog->date_time = $todayDate;

        $activityLog->save();

        return redirect()->route('patientLogs-page');
    }

    public function activityLogInLogOut(){ //display users activity

        $activityLogs = ActivityLog::all();

        return view('pages.clinic_staff.patient-logs.user-activity-logs', compact(
            'activityLogs',
        ));
    }
}
