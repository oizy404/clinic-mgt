<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Models\HealthEvaluation;
use App\Models\Position;
use App\Models\Department;
use App\Models\YearLevel;

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
        return view("pages.consultation-record")->with(compact("records", $records));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = PatientProfile::all();
        $records = HealthEvaluation::all();
        return view("pages.add-consultation-record")->with(compact(
            "records", $records,
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
        $record->doctors_note = $request->doctors_note;
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
            $position->health_evaluation_id = $record->id;
            $position->save();
    
            $yearlevel = new YearLevel();
            $yearlevel->grade_level = $request->grade_level;
            $yearlevel->department_id = $request->department;
            $yearlevel->save();
        }
        return redirect()->back();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
