<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use App\Models\Event;

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
        
        $messages = Message::orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.sender')
            ->select('users.*','tbl_messages.sender')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('sender');
            
        return view("pages.messaging.message-doctor")->with( compact(
            "messages", $messages,
            "users", $users));
    }
    public function doctorMessageShow(Request $request, $id){
        $message = Message::where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

        return ($message);
    }
    public function insertDoctorMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){

            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->receiver = $request->receiver_id;
        $message->read = 0;

        $message->save();

        return redirect()->back();
    }

    public function clinicstaffIndex(){

        $messages = Message::orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('tbl_messages', 'users.id', '=', 'tbl_messages.sender')
            ->select('users.*','tbl_messages.sender')
            ->orderBy('tbl_messages.created_at','desc')
            ->where('rank','patient')
            ->get()->groupBy('sender');
            
        return view("pages.messaging.message-clinicstaff")->with( compact(
            "users", $users,
            "messages", $messages));
    }

    public function clinicstaffMessageShow(){
        $users = DB::table('users')
        ->join('tbl_messages', 'users.id', '=', 'tbl_messages.sender')
        ->select('users.*','tbl_messages.sender')
        ->orderBy('tbl_messages.created_at','desc')
        ->where('rank','patient')
        ->get()->groupBy('sender');
        
        $messages = Message::orderBy('created_at', 'asc')->get();

        return view("pages.messaging.message-clinicstaff")->with("messages", $messages)->with("users", $users);
    }

    public function insertClinicstaffMsg(){

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

        $message->read = 1;
        $message->receiver = 2;
        $message->save();

        return redirect()->back();
    }

    public function delete($id){
        
    }

}
