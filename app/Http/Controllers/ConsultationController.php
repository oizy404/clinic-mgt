<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PatientProfile;
use App\Models\Visitor;
use App\Models\HealthEvaluation;
use App\Models\Position;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\ChiefComplaint;
use App\Models\Complaint;
use App\Models\OtherComplaint;

use Carbon\Carbon;


class ConsultationController extends Controller
{
    
    public function index()
    {
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        $patientsRecords = DB::table('tbl_patient_profiles')
            ->join('tbl_health_evaluations', 'tbl_patient_profiles.id', '=', 'tbl_health_evaluations.patient_id')
            ->select('tbl_patient_profiles.*','tbl_health_evaluations.patient_id')
            ->orderBy('tbl_health_evaluations.created_at','asc')
            ->get()->groupBy('patient_id');
            
        $visitorsRecords = DB::table('tbl_visitors')
            ->join('tbl_health_evaluations', 'tbl_visitors.id', '=', 'tbl_health_evaluations.visitor_id')
            ->select('tbl_visitors.*','tbl_health_evaluations.visitor_id')
            ->orderBy('tbl_health_evaluations.created_at','asc')
            ->where('patient_role','Visitor')
            ->get()->groupBy('visitor_id');

        return view("pages.clinic_staff.health-eval.doctor.consultation-record", compact(
            "patients",
            "visitors",
            "patientsRecords",
            "visitorsRecords"
        ));
    }

    public function create()
    {
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.doctor.add-consultation-record", compact(
            "patients",
            "visitors",
        ));
    }

    public function store(Request $request)
    {
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $record = new HealthEvaluation();
        $record->patient_id = $request->id;
        $record->visitor_id = $request->visitorId;
        $record->weight = $request->weight;
        $record->height = $request->height;

        $bmi = $request->weight / ($request->height * $request->height);
        $record->BMI = $bmi;

        $record->BP = $request->bloodpressure;
        $record->temperature = $request->temperature;
        $record->doctors_note = $request->doctors_note;
        $record->doctors_name = $request->doctors_name;
        $record->nurse_note = $request->nurse_note;
        $record->nurse_name = $request->nurse_name;
        $record->followupCheckup = $request->nextCheckup;
        $record->eval_date = $todayDate;
        $record->archived = 0;
        $record->save();

        $position = new Position();
        $position->personnel_rank = $request->personnel_rank;
        $position->department_id = $request->department;
        $position->yearLevel_id = $request->grade_level;
        $position->health_evaluation_id = $record->id;
        $position->save();
    
        if($request->complaints){
            foreach($request->complaints as $complaint){
                $chiefComplaint = Complaint::create([
                    'chief_complaints_id' => $complaint,
                    'health_evaluation_id' => $record->id,
                ]);
            }
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

    
    public function showVisitor($visitor_id)
    {
        $records = HealthEvaluation::where('visitor_id', $visitor_id)->get();
        $patients = PatientProfile::all();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.doctor.visitor.show-consultation-record")->with(compact(
            "visitor_id",
            "records", $records,
            "patients", $patients,
            "chief_complaints", $chief_complaints,
        ));
    }

    public function edit($id){
        $record = HealthEvaluation::find($id);
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.doctor.edit-consultation-record", compact(
            "record",
            "patients",
            "visitors",

        ));
    }

    public function editVisitor($id){
        $record = HealthEvaluation::find($id);
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.doctor.visitor.edit-consultation-record", compact(
            "record",
            "patients",
            "visitors",

        ));
    }
    public function update(Request $request, $id)
    {
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $record = HealthEvaluation::find($id);

        // $record->patient_id = $request->id;
        $record->weight = $request->weight;
        $record->height = $request->height;

        $bmi = $request->weight / ($request->height * $request->height);
        $record->BMI = $bmi;

        $record->BP = $request->bloodpressure;
        $record->temperature = $request->temperature;
        $record->doctors_note = $request->doctors_note;
        $record->doctors_name = $request->doctors_name;
        $record->nurse_note = $request->nurse_note;
        $record->nurse_name = $request->nurse_name;
        $record->followupCheckup = $request->nextCheckup;
        $record->eval_date = $todayDate;
        $record->archived = 0;
        $record->save();

        $position = Position::where('health_evaluation_id',$record->id)->first();
        $position->personnel_rank = $request->personnel_rank;
        $position->department_id = $request->department;
        $position->yearLevel_id = $request->grade_level;
        $position->health_evaluation_id = $record->id;
        $position->save();
    
        $chiefComplaints = Complaint::where('health_evaluation_id',$record->id)->get();
        foreach($chiefComplaints as $chiefComplaint){
            $CC = Complaint::find($chiefComplaint->id);
            $CC->delete();
        }

        if($request->complaints){
            foreach($request->complaints as $complaint){
                $chiefComplaint = Complaint::create([
                    'chief_complaints_id' => $complaint,
                    'health_evaluation_id' => $record->id,
                ]);
            }
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

    
    public function printVisitorAll($visitor_id)
    {
        $records = HealthEvaluation::where('visitor_id', $visitor_id)->get();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.doctor.visitor.printAll-health-eval")->with(compact(
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
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        $patientsRecords = DB::table('tbl_patient_profiles')
            ->join('tbl_health_evaluations', 'tbl_patient_profiles.id', '=', 'tbl_health_evaluations.patient_id')
            ->select('tbl_patient_profiles.*','tbl_health_evaluations.patient_id')
            ->orderBy('tbl_health_evaluations.created_at','asc')
            ->get()->groupBy('patient_id');
            
        // $records = HealthEvaluation::all()->groupBy('patient_id');
        // dd($records);
        $visitorsRecords = DB::table('tbl_visitors')
            ->join('tbl_health_evaluations', 'tbl_visitors.id', '=', 'tbl_health_evaluations.visitor_id')
            ->select('tbl_visitors.*','tbl_health_evaluations.visitor_id')
            ->orderBy('tbl_health_evaluations.created_at','asc')
            ->where('patient_role','Visitor')
            ->get()->groupBy('visitor_id');

        return view("pages.clinic_staff.health-eval.clinic-staff.consultation-record", compact(
            "patients",
            "visitors",
            "patientsRecords",
            "visitorsRecords"
        ));
    }

    public function create2()
    {
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.add-consultation-record", compact(
            "patients",
            "visitors",
        ));
    }

    public function store2(Request $request)
    {
        
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $record = new HealthEvaluation();
        $record->patient_id = $request->id;
        $record->visitor_id = $request->visitorId;
        $record->weight = $request->weight;
        $record->height = $request->height;

        $bmi = $request->weight / ($request->height * $request->height);
        $record->BMI = $bmi;

        $record->BP = $request->bloodpressure;
        $record->temperature = $request->temperature;
        $record->doctors_note = $request->doctors_note;
        $record->doctors_name = $request->doctors_name;
        $record->nurse_note = $request->nurse_note;
        $record->nurse_name = $request->nurse_name;
        $record->followupCheckup = $request->nextCheckup;
        $record->eval_date = $todayDate;
        $record->archived = 0;
        $record->save();

        $position = new Position();
        $position->personnel_rank = $request->personnel_rank;
        $position->department_id = $request->department;
        $position->yearLevel_id = $request->grade_level;
        $position->health_evaluation_id = $record->id;
        $position->save();
    
        if($request->complaints){
            foreach($request->complaints as $complaint){
                $chiefComplaint = Complaint::create([
                    'chief_complaints_id' => $complaint,
                    'health_evaluation_id' => $record->id,
                ]);
            }
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
    public function showVisitor2($visitor_id)
    {
        $records = HealthEvaluation::where('visitor_id', $visitor_id)->get();
        $patients = PatientProfile::all();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.visitor.show-consultation-record")->with(compact(
            "visitor_id",
            "records", $records,
            "patients", $patients,
            "chief_complaints", $chief_complaints,
        ));
    }

    public function edit2($id){
        $record = HealthEvaluation::find($id);
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.edit-consultation-record", compact(
            "record",
            "patients",
            "visitors",

        ));
    }

    public function editVisitor2($id){
        $record = HealthEvaluation::find($id);
        $patients = PatientProfile::all();
        $visitors = Visitor::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.visitor.edit-consultation-record", compact(
            "record",
            "patients",
            "visitors",

        ));
    }

    public function update2(Request $request, $id)
    {
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $record = HealthEvaluation::find($id);

        // $record->patient_id = $request->id;
        $record->weight = $request->weight;
        $record->height = $request->height;

        $bmi = $request->weight / ($request->height * $request->height);
        $record->BMI = $bmi;

        $record->BP = $request->bloodpressure;
        $record->temperature = $request->temperature;
        $record->doctors_note = $request->doctors_note;
        $record->doctors_name = $request->doctors_name;
        $record->nurse_note = $request->nurse_note;
        $record->nurse_name = $request->nurse_name;
        $record->followupCheckup = $request->nextCheckup;
        $record->eval_date = $todayDate;
        $record->archived = 0;
        $record->save();

        $position = Position::where('health_evaluation_id',$record->id)->first();
        $position->personnel_rank = $request->personnel_rank;
        $position->department_id = $request->department;
        $position->yearLevel_id = $request->grade_level;
        $position->health_evaluation_id = $record->id;
        $position->save();
    
        $chiefComplaints = Complaint::where('health_evaluation_id',$record->id)->get();
        foreach($chiefComplaints as $chiefComplaint){
            $CC = Complaint::find($chiefComplaint->id);
            $CC->delete();
        }

        if($request->complaints){
            foreach($request->complaints as $complaint){
                $chiefComplaint = Complaint::create([
                    'chief_complaints_id' => $complaint,
                    'health_evaluation_id' => $record->id,
                ]);
            }
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
    public function printVisitorAll2($visitor_id)
    {
        $records = HealthEvaluation::where('visitor_id', $visitor_id)->get();
        $chief_complaints = ChiefComplaint::all();

        return view("pages.clinic_staff.health-eval.clinic-staff.visitor.printAll-health-eval")->with(compact(
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
