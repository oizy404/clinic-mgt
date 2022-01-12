<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Imports\StudentImport;
use App\Models\Sibling;
use App\Models\Guardian;
use App\Models\Location;
use App\Models\City;
use App\Models\Province;

use Excel;

class PatientController extends Controller
{
    public function import(Request $request){

        Excel::import(new StudentImport, $request->file);
        return back()->with('Record are fucking imported successfully');
    }

    //STUDENTS PERSONAL INFORMATION
    public function index(){
        $patients = PatientProfile::all();
        return view("pages.student-health-data")->with("patients", $patients);
    }

    public function insert(Request $request){

        // $tbl_student = Student::find(41);
        // dd($tbl_student->tbl_sibling());
        $patient = new PatientProfile();
        
        $patient->school_id = $request->student_idnumber;
        $patient->first_name = $request->first_name;
        $patient->middle_name = $request->middle_name;
        $patient->last_name = $request->last_name;
        $patient->birthday = $request->birthday;
        $patient->sex = $request->sex;
        $patient->address = $request->address;
        $patient->contact_number = $request->contact_number;
        $patient->status = $request->status;
        $patient->religion = $request->religion;
        $patient->nationality = $request->nationality;
        $patient->patient_division_id = 1;
        $patient->save();

        // $parent = new BirthParent();
        // $parent->complete_name = $request->FName->MName;
        // $parent->birthday = $request->Fbirthdate,
        // $parent->contact_number = $request->FcontactNo,
        // $parent->occupation = $request->FOccupation,
        // $parent->employment_address = $request->FEmploymentAdd,
        // $parent->patient_id = $student->id;
        // $parent->save();


        
        $province = new Province();
        $province->province = $request->province;
        $province->save();

        $city = new City();
        $city->city = $request->city;
        $city->province_id = $province->id;
        $city->save();

        $location = new Location();
        $location->street_address = $request->streetAdd;
        $location->barangay = $request->barangay;
        $location->city_id = $city->id;
        $location->save();

        $guardian = new Guardian();
        $guardian->complete_name = $request->GName;
        $guardian->relationship = $request->GRelationship;
        $guardian->contact_number = $request->GContactNo;
        $guardian->location_id = $location->id;
        $guardian->patient_id = $patient->id;
        $guardian->save();

        $sibling = new Sibling();
        $sibling->complete_name = $request->sName;
        $sibling->age = $request->sAge;
        $sibling->sex = $request->sSex;
        $sibling->patient_id = $patient->id;
        $sibling->save();


        return redirect()->route('student-health-data');
    }
    // public function show($id){
        
    // }
        // public function edit($id){

        // }
        // public function update(Request $request, $id){

        // }
    // public function destroy($id){

    // }

    // public function importForm(){
    //     return view('pages.student-health-data');
    // }
}