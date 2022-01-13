<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
    public $messages;
    public $message;

    public $users;
    // public function index(){
    //     $users = User::all();
    //     $messages = Message::all();

    //     return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    // }
    public function doctorIndex(){
        
        $messages = DB::table('tbl_messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.sender')
            ->select('users.*','tbl_messages.sender')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('sender');
            
        return view("pages.messaging.message-doctor")->with( compact("messages", $messages,
                                                    "users", $users));
    }
    public function doctorMessageShow(Request $request, $id){
        $message = DB::table('tbl_messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

        return ($message);
    }
    public function insertDoctorMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->username;

        $message->save();

        return redirect()->back();
    }

    public function patientIndex(){
        $users = User::all();
        $messages = DB::table('tbl_messages')->orderBy('created_at', 'asc')->get();

        return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    }

    public function insertPatientMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->read = 1;
        $message->receiver = 2;

        $message->save();

        return redirect()->back();
    }

    public function delete($id){
        
    }

}
