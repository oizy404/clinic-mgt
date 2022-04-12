<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use App\Models\Event;
use App\Models\PatientProfile;


class MessageController extends Controller
{
    public $messages;
    public $message;

    public $users;

    // Start Doctor Message Functions

    public function doctorIndex(){

        $messages = Message::orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.receiver')
            ->select('users.*','tbl_messages.receiver')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('receiver');

        $patients = PatientProfile::all();
        
        return view("pages.messaging.message-doctor")->with( compact(
            "users", $users,
            "messages", $messages,
            "patients", $patients
        ));
    }
    
    public function doctorViewCreate($id){
        $messages = Message::orderBy('created_at', 'asc')->get();

        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.receiver')
            ->select('users.*','tbl_messages.receiver')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('receiver');
            
        $patientusers = User::all();
        $patients = PatientProfile::all();

        return view("pages.messaging.msg-doctor-viewcreate")->with( compact(
            "id",
            "users", $users,
            "messages", $messages,
            "patientusers", $patientusers,
            "patients", $patients
        ));
    }

    public function insertDoctorMsg(Request $request, $id){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){
            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->receiver = $id;
        $message->read = 0;
        $message->save();

        return redirect()->back();
    }

    // End Doctor Message Functions

    // Clinic Staff Message Functions

    public function clinicstaffIndex(){

        $messages = Message::orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.receiver')
            ->select('users.*','tbl_messages.receiver')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('receiver');
        $patients = PatientProfile::all();
        return view("pages.messaging.message-clinicstaff")->with( compact(
            "users", $users,
            "messages", $messages,
            "patients", $patients
        ));
    }
    
    public function clinicstaffViewCreate($id){
        $messages = Message::orderBy('created_at', 'asc')->get();
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.receiver')
            ->select('users.*','tbl_messages.receiver')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('receiver');
        $patientusers = User::all();
        $patients = PatientProfile::all();

        return view("pages.messaging.msg-clinicstaff-viewcreate")->with( compact(
            "id",
            "users", $users,
            "messages", $messages,
            "patientusers", $patientusers,
            "patients", $patients
        ));
    }

    public function insertClinicstaffMsg(Request $request, $id){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){

            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->receiver = $id;
        $message->read = 0;

        $message->save();

        return redirect()->back();
    }



    public function patientIndex(){
        $users = User::all();
        $messages = Message::orderBy('created_at', 'asc')->get();

        return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    }

    public function insertPatientMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){

            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->read = 0;
        $message->receiver = 2;
        $message->save();

        return redirect()->back();
    }

    public function delete($id){
        
    }

}
