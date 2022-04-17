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
    
    public function index()
    {
        $records = HealthEvaluation::all()->groupBy('patient_id');
        return view("pages.clinic_staff.health-eval.doctor.consultation-record")->with(compact(
            "records", $records,
        ));
    }

    public function create()
    {
        $patients = PatientProfile::all();
        return view("pages.clinic_staff.health-eval.doctor.add-consultation-record")->with(compact(
            "patients", $patients,
        ));
    }

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

        return redirect()->route('doctor/consultation-record');

    }

    public function show($patient_id)
    {
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();
        $patients = PatientProfile::all();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.doctor.show-consultation-record")->with(compact(
            "patient_id",
            "records", $records,
            "patients", $patients,
            "chief_complaints", $chief_complaints,
        ));
    }

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

        return redirect()->route('doctor/consultation-record');
    }

    public function printAll($patient_id)
    {
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.doctor.printAll-health-eval")->with(compact(
            "records", $records,
            "chief_complaints", $chief_complaints,

        ));
    }

    public function print($id)
    {
        $record = HealthEvaluation::find($id);
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.doctor.print-health-eval")->with(compact(
            "record", $record,
            "chief_complaints", $chief_complaints,

        ));
    }

    public function archive($id, Request $request){
        $record = HealthEvaluation::find($id);
        $record->archived = 1;
        $record->save();
        
        return redirect()->back();
    }

    public function archiveAll($patient_id, Request $request){
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();

        foreach($records as $record){
            $record->archived = 1;
            $record->save();
        }
        
        return redirect()->back();
    }

    // End Doctor //////////////////////////////////////////////////////////////////////////

    // Start Clinic Staff /////////////////////////////////////////////////////////////////////
    public function index2()
    {
        $records = HealthEvaluation::all()->groupBy('patient_id');
        return view("pages.clinic_staff.health-eval.clinic-staff.consultation-record")->with(compact(
            "records", $records,
        ));
    }

    public function create2()
    {
        $patients = PatientProfile::all();
        return view("pages.clinic_staff.health-eval.clinic-staff.add-consultation-record")->with(compact(
            "patients", $patients,
        ));
    }

    public function store2(Request $request)
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

        return redirect()->route('clinicstaff/consultation-record');

    }

    public function show2($patient_id)
    {
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();
        $patients = PatientProfile::all();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.show-consultation-record")->with(compact(
            "patient_id",
            "records", $records,
            "patients", $patients,
            "chief_complaints", $chief_complaints,
        ));
    }

    public function update2(Request $request, $id)
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

        return redirect()->route('clinicstaff/consultation-record');
    }

    public function printAll2($patient_id)
    {
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.printAll-health-eval")->with(compact(
            "records", $records,
            "chief_complaints", $chief_complaints,

        ));
    }

    public function print2($id)
    {
        $record = HealthEvaluation::find($id);
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.print-health-eval")->with(compact(
            "record", $record,
            "chief_complaints", $chief_complaints,

        ));
    }

    public function archive2($id, Request $request){
        $record = HealthEvaluation::find($id);
        $record->archived = 1;
        $record->save();
        
        return redirect()->back();
    }

    public function archiveAll2($patient_id, Request $request){
        $records = HealthEvaluation::where('patient_id', $patient_id)->get();

        foreach($records as $record){
            $record->archived = 1;
            $record->save();
        }
        
        return redirect()->back();
    }
}
