<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PatientProfile;
use App\Models\Event;
use Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::latest()->get(); //get the latest data
        $patients = PatientProfile::all();
        if($event->archived == 0){
            return response()->json($event);
        }
    }

    public function index2(){
        $patients = PatientProfile::all();
        return view("pages.clinic_staff.appointments")->with(compact(
            "patients", $patients,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            
            $validator = Validator::make($request->all(),[
                'title'=>'required',
                'start'=>'required',
                'end'=>'required',
                'allDay'=>'required',
                'color'=>'required',
                'textColor'=>'required',
            ]);
            if($validator->failed()){
                Alert::error('Error!',$validator->messages()->first());
                return redirect()->back();
            }
            else{
                if(empty($request->event_id)){ //Create Event
                    $event = new Event();
                    $event->title = $request->title;
                    $event->start = $request->start;
                    $event->end = $request->end;
                    $event->allDay = $request->allDay;
                    $event->color = $request->color;
                    $event->textColor = $request->textColor;
                    $event->patient_id = $request->patient_id;
                    $event->archived = 0;
                    $event->save();
                    
                    Alert::success('Success','Event Created Successfully');
                    return redirect()->back();
                }
                else{
                    Event::where('id', $request->event_id)->update([ //Update Event
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                        'allDay' => $request->allDay,
                        'color' => $request->color,
                        'textColor' => $request->textColor,
                        'patient_id' => $request->patient_id,
                    ]);
                    Alert::success('Success','Event Updated Successfully');
                    return redirect()->back();
                }
            }
        }
        catch(\Exception $e){
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $event = Event::find($id);
    //     $event->delete(); //delete a column
    //     Alert::success('Success','Event Deleted Successfully');
    //     return redirect()->back();
        
    // }
    public function archive($id, Request $request){
        $event = Event::find($id);
        $event->archived = 1;
        $event->save();

        Alert::success('Success','Event Deleted Successfully');
        return redirect()->back();
    }
}
