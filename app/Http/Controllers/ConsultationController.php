<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Models\HealthEvaluation;
use App\Models\Position;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\ChiefComplaint;
use App\Models\Complaint;
use App\Models\OtherComplaint;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = HealthEvaluation::all();
        return view("pages.clinic_staff.consultation-record")->with(compact(
            "records", $records,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = PatientProfile::all();
        return view("pages.clinic_staff.add-consultation-record")->with(compact(
            "patients", $patients,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new HealthEvaluation();
        $record->patient_id = $request->id;
        $record->weight = $request->weight;
        $record->height = $request->height;
        $record->BMI = $request->bmi;
        $record->BP = $request->bloodpressure;
        $record->temperature = $request->temperature;
        $record->doctors_note = $request->doctors_note;
        $record->nurse_note = $request->nurse_note;
        $record->archived = 0;
        $record->save();

        if($request->patient_role == "Employee"){
            $position = new Position();
            $position->personnel_position = $request->personnel_position;
            $position->personnel_rank = $request->personnel_rank;
            $position->department_id = $request->department;
            $position->health_evaluation_id = $record->id;
            $position->save();
        }
        elseif($request->patient_role == "Student"){

            $position = new Position();
            $position->personnel_position = $request->personnel_position;
            $position->personnel_rank = $request->personnel_rank;
            $position->department_id = $request->department;
            $position->yearLevel_id = $request->grade_level;
            $position->health_evaluation_id = $record->id;
            $position->save();
    
        }

        foreach($request->complaints as $complaint){
            $chiefComplaint = Complaint::create([
                'chief_complaints_id' => $complaint,
                'health_evaluation_id' => $record->id,
            ]);
        }

        $otherComplaint = new OtherComplaint();
        $otherComplaint->other_chief_complaint = $request->other_complaint;
        $otherComplaint->health_evaluation_id = $record->id;
        $otherComplaint->save();

        return redirect()->route('consultation-record');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = HealthEvaluation::find($id);
        return view("pages.clinic_staff.show-consultation-record")->with(compact(
            "record", $record,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = HealthEvaluation::find($id);
        $patients = PatientProfile::all();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.edit-consultation-record")->with(compact(
            "record", $record,
            "patients", $patients,
            "chief_complaints", $chief_complaints,
        ));
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
        $record = HealthEvaluation::find($id);
        $record->patient_id = $request->id;
        $record->weight = $request->weight;
        $record->height = $request->height;
        $record->BMI = $request->bmi;
        $record->BP = $request->bloodpressure;
        $record->doctors_note = $request->doctors_note;
        $record->archived = 0;
        $record->save();

        if($request->patient_role == "Employee"){
            $position = Position::where('health_evaluation_id',$record->id)->first();
            $position->personnel_position = $request->personnel_position;
            $position->personnel_rank = $request->personnel_rank;
            $position->department_id = $request->department;
            $position->health_evaluation_id = $record->id;
            $position->save();
        }
        elseif($request->patient_role == "Student"){
        
            $position = Position::where('health_evaluation_id',$record->id)->first();
            $position->personnel_position = $request->personnel_position;
            $position->personnel_rank = $request->personnel_rank;
            $position->department_id = $request->department;
            $position->yearLevel_id = $request->grade_level;
            $position->health_evaluation_id = $record->id;
            $position->save();
        }

        $complaints = Complaint::where('health_evaluation_id',$record->id)->get();
        foreach($complaints as $complaint){
            $chiefComplaint = Complaint::find($complaint->id);
            $chiefComplaint->delete();
        }

        foreach($request->complaints as $complaint){
            $chiefComplaint = Complaint::create([
                'chief_complaints_id' => $complaint,
                'health_evaluation_id' => $record->id,
            ]);
        }

        $otherComplaint = OtherComplaint::where('health_evaluation_id',$record->id)->first();
        $otherComplaint->other_chief_complaint = $request->other_complaint;
        $otherComplaint->health_evaluation_id = $record->id;
        $otherComplaint->save();

        return redirect()->route('consultation-record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    public function archive($id, Request $request){
        $record = HealthEvaluation::find($id);
        $record->archived = 1;
        $record->save();
        
        return redirect()->back();
    }
}
