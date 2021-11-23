<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(){
        $users = User::all();
        $messages = Message::all();

        return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    }
    public function doctorIndex(){
        $users = User::all();
        $messages = Message::all();

        return view("pages.messaging.compose-doctor")->with("messages", $messages)->with("users", $users);
    }
    public function insertDoctorMsg(Request $request){
        $message = new Message();
        $message->sender = 2;
        $message->message = $request->message;
        $message->receiver = $request->username;

        $message->save();

        return redirect()->back();
    }
    public function patientIndex(){
        $users = User::all();
        $messages = Message::all();

        return view("pages.messaging.compose-patient")->with("messages", $messages)->with("users", $users);
    }
    public function insertPatientMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = 2;

        $message->save();

        return redirect()->back();
    }
    public function show($id){

    }
    public function delete($id){
        
    }

}
