<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Appointment::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('pages.appointments');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
 
        switch ($request->type) {
            case 'add':
                $appointment = Appointment::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
    
                return response()->json($appointment);
                break;
    
            case 'update':
                $appointment = Appointment::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
    
                return response()->json($appointment);
                break;
    
            case 'delete':
                $appointment = Appointment::find($request->id)->delete();
    
                return response()->json($appointment);
                break;

            case 'show':
                $appointment = Appointment::find($request->id)->show();
                
                return response()->json($appointment);
                break;
            default:
                # code...
                break;
        }
    }
}
