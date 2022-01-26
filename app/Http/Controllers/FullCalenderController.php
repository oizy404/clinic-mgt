<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationSchedule;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = ConsultationSchedule::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('pages.fullcalender');
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
              $event = ConsultationSchedule::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = ConsultationSchedule::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = ConsultationSchedule::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }

}
