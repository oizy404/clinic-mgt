<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataImportExcel;
use App\Models\PatientProfile;
use App\Models\BirthParent;
use App\Models\Sibling;
use App\Models\Guardian;
use App\Models\Location;
use App\Models\City;
use App\Models\Province;
use App\Models\FamilyDesease;
use App\Models\HistoryIllness;
use App\Models\Immunization;
use App\Models\Maintenance;

use Excel;

class PatientController extends Controller
{
    public function import(Request $request){

        Excel::import(new DataImportExcel, $request->file);
        return back()->with('Records are imported successfully');
    }

    //STUDENTS PERSONAL INFORMATION
    public function index(){
        $patients = PatientProfile::all();
        return view("pages.health-data")->with(compact("patients", $patients,));
    }

    public function index2(){
        return view("pages.add-health-data");
    }

    public function insert(Request $request){

        // $tbl_student = Student::find(41);
        // dd($tbl_student->tbl_sibling());
        // dd($request->all());
        $patient = new PatientProfile();
        
        $patient->school_id = $request->student_idnumber;
        $patient->patient_role = $request->role;
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
        $patient->archived = 0;
        $patient->save();

        $parent = new BirthParent();
        $parent->complete_name = $request->parentsComplete_name;
        $parent->birthday = $request->parentsBirthday;
        $parent->contact_number = $request->parentsContact_number;
        $parent->occupation = $request->parentsOccupation;
        $parent->employment_address = $request->parentsEmployment_address;
        $parent->patient_id = $patient->id;
        $parent->save();


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
        $sibling->complete_name = $request->siblingComplete_name;
        $sibling->age = $request->siblingAge;
        $sibling->sex = $request->siblingSex;
        $sibling->patient_id = $patient->id;
        $sibling->save();

        foreach($request->deseases as $desease){
            FamilyDesease::create([
                'desease_id' => $desease,
                'patient_id' => $patient->id,
            ]);
        }

        foreach($request->illnesses as $illness){
            HistoryIllness::create([
                'illness_id' => $illness,
                'patient_id' => $patient->id,
            ]);
        }
        if($patient->patient_role == "Student"){
            foreach($request->vaccines as $vaccine){
                Immunization::create([
                    'vaccine_id' => $vaccine,
                    'patient_id' => $patient->id,
                ]);
            }
        }
        elseif($patient->patient_role == "Employee"){
            $maintenance = new Maintenance();
            $maintenance->medication_name = $request->medication_name;
            $maintenance->dosage = $request->dosage;
            $maintenance->frequency = $request->frequency;
            $maintenance->patient_id = $patient->id;
            $maintenance->save();
        }

        return redirect()->route('health-data');
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
