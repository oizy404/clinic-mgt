<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Imports\MultipleUserImport;
use App\Exports\ActivityLogsExport;
use App\Models\userActivityLog;
use App\Models\ActivityLog;
use App\Models\User;

use Excel;
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
        $password = $request->password;
        $activityLog->password = Hash::make($password);
        $activityLog->rank = 'patient';
        $activityLog->archived = 0;
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
        $password = $request->password;
        $activityLog->password = Hash::make($password);        
        $activityLog->rank = $request->rank;
        $activityLog->date_time = $todayDate;

        $activityLog->save();

        return redirect()->route('patientLogs-page');
    }

    public function archive($id){
        $activityLog = User::find($id);
        $activityLog->archived = 1;
        $activityLog->save();
        
        return redirect()->back();
    }

    public function delete($id){
        $patient = User::find($id);
        $patient->delete(); //delete a column

        return redirect()->back();
    }

    public function restore($id){
        $patient = User::find($id);
        $patient->archived = 0;
        $patient->save();
        
        return redirect()->back();
    }

    public function activityLogInLogOut(){ //display users activity

        $activityLogs = ActivityLog::orderBy('created_at', 'asc')->get();


        return view('pages.clinic_staff.patient-logs.user-activity-logs', compact(
            'activityLogs',
        ));
    }

    public function exportExcel($type) 
    {
        return \Excel::download(new ActivityLogsExport, 'user-activity-logs.'.$type);
    }
}
