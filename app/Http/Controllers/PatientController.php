<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataImportExcel;
use App\Models\PatientProfile;
use App\Models\ParentModel;
use App\Models\Sibling;
use App\Models\Guardian;
use App\Models\Location;
use App\Models\City;
use App\Models\Province;
use App\Models\Desease;
use App\Models\FamilyDesease;
use App\Models\Cancer;
use App\Models\OtherDesease;
use App\Models\HistoryIllness;
use App\Models\Allergy;
use App\Models\Fracture;
use App\Models\Operation;
use App\Models\Hospitalization;
use App\Models\BehavioralProblem;
use App\Models\OtherIllness;
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
        return view("pages.clinic_staff.health-data")->with(compact("patients", $patients,));
    }

    public function index2(){
        return view("pages.clinic_staff.add-health-data");
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

        $parent = new ParentModel();
        $parent->complete_name = $request->fatherComplete_name;
        $parent->relationship = $request->fatherRelationship;
        $parent->birthday = $request->fatherBirthday;
        $parent->contact_number = $request->fatherContact_number;
        $parent->occupation = $request->fatherOccupation;
        $parent->employment_address = $request->fatherEmployment_address;
        $parent->patient_id = $patient->id;
        $parent->save();

        $parent = new ParentModel();
        $parent->complete_name = $request->motherComplete_name;
        $parent->relationship = $request->motherRelationship;
        $parent->birthday = $request->motherBirthday;
        $parent->contact_number = $request->motherContact_number;
        $parent->occupation = $request->motherOccupation;
        $parent->employment_address = $request->motherEmployment_address;
        
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

//////////start Desease data /////////////////////

        foreach($request->deseases as $desease){
            FamilyDesease::create([
                'desease_id' => $desease,
                'patient_id' => $patient->id,
            ]);
        }
        
        $cancer = new Cancer();
        $cancer->cancer = $request->cancer;
        $cancer->patient_id = $patient->id;
        $cancer->save();

        $otherDesease = new OtherDesease();
        $otherDesease->other_desease = $request->otherDesease;
        $otherDesease->patient_id = $patient->id;
        $otherDesease->save();

//////////end Desease data /////////////////////

//////////start History Illness data /////////////////////

        foreach($request->illnesses as $illness){
            HistoryIllness::create([
                'illness_id' => $illness,
                'patient_id' => $patient->id,
            ]);
        }
        $allergy = new Allergy();
        $allergy->allergy = $request->allergy;
        $allergy->patient_id = $patient->id;
        $allergy->save();

        $fracture = new Fracture();
        $fracture->fracture = $request->fracture;
        $fracture->patient_id = $patient->id;
        $fracture->save();

        $operation = new Operation();
        $operation->operation = $request->operation;
        $operation->patient_id = $patient->id;
        $operation->save();

        $hospitalization = new Hospitalization();
        $hospitalization->hospitalization = $request->hospitalization;
        $hospitalization->patient_id = $patient->id;
        $hospitalization->save();

        $behavior = new BehavioralProblem();
        $behavior->behavior = $request->behavior;
        $behavior->patient_id = $patient->id;
        $behavior->save();

        $otherIllness = new OtherIllness();
        $otherIllness->other_illness = $request->otherIllness;
        $otherIllness->patient_id = $patient->id;
        $otherIllness->save();

//////////end History Illness data /////////////////////

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
    public function edit($id){

        $patient = PatientProfile::find($id);
        $deseases = Desease::all();
        // foreach($patient->guardian as $guardiann){
        //     foreach($guardiann->location as $locationn){
        //         dd($locationn->city->province_id);
        //     }
        // }
        // foreach($patient->familyDesease as $family_desease){
        //     dd($family_desease->desease->desease_name);
        // }


        return view("pages.clinic_staff.edit-health-data")->with(compact(
            "patient",
            "deseases"
        ));

    }
    public function update(Request $request, $id){

        $patient = PatientProfile::find($id);
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

        $parent = ParentModel::find($id);
        $parent->complete_name = $request->fatherComplete_name;
        $parent->relationship = $request->fatherRelationship;
        $parent->birthday = $request->fatherBirthday;
        $parent->contact_number = $request->fatherContact_number;
        $parent->occupation = $request->fatherOccupation;
        $parent->employment_address = $request->fatherEmployment_address;
        $parent->patient_id = $patient->id;
        $parent->save();

        $parent = ParentModel::find($id);
        $parent->complete_name = $request->motherComplete_name;
        $parent->relationship = $request->motherRelationship;
        $parent->birthday = $request->motherBirthday;
        $parent->contact_number = $request->motherContact_number;
        $parent->occupation = $request->motherOccupation;
        $parent->employment_address = $request->motherEmployment_address;
        
        $parent->patient_id = $patient->id;
        $parent->save();


        $province = Province::find($id);
        $province->province = $request->province;
        $province->save();

        $city = City::find($id);
        $city->city = $request->city;
        $city->province_id = $province->id;
        $city->save();

        $location = Location::find($id);
        $location->street_address = $request->streetAdd;
        $location->barangay = $request->barangay;
        $location->city_id = $city->id;
        $location->save();

        $guardian = Guardian::find($id);
        $guardian->complete_name = $request->GName;
        $guardian->relationship = $request->GRelationship;
        $guardian->contact_number = $request->GContactNo;
        $guardian->location_id = $location->id;
        $guardian->patient_id = $patient->id;
        $guardian->save();

        $sibling = Sibling::find($id);
        $sibling->complete_name = $request->siblingComplete_name;
        $sibling->age = $request->siblingAge;
        $sibling->sex = $request->siblingSex;
        $sibling->patient_id = $patient->id;
        $sibling->save();

//////////start Desease data /////////////////////

        foreach($request->deseases as $desease){
            FamilyDesease::update([
                'desease_id' => $desease,
                'patient_id' => $patient->id,
            ]);
        }
        
        $cancer = Cancer::find($id);
        $cancer->cancer = $request->cancer;
        $cancer->patient_id = $patient->id;
        $cancer->save();

        $otherDesease = OtherDesease::find($id);
        $otherDesease->other_desease = $request->otherDesease;
        $otherDesease->patient_id = $patient->id;
        $otherDesease->save();

//////////end Desease data /////////////////////

//////////start History Illness data /////////////////////

        foreach($request->illnesses as $illness){
            HistoryIllness::update([
                'illness_id' => $illness,
                'patient_id' => $patient->id,
            ]);
        }
        $allergy = Allergy::find($id);
        $allergy->allergy = $request->allergy;
        $allergy->patient_id = $patient->id;
        $allergy->save();

        $fracture = Fracture::find($id);
        $fracture->fracture = $request->fracture;
        $fracture->patient_id = $patient->id;
        $fracture->save();

        $operation = Operation::find($id);
        $operation->operation = $request->operation;
        $operation->patient_id = $patient->id;
        $operation->save();

        $hospitalization = Hospitalization::find($id);
        $hospitalization->hospitalization = $request->hospitalization;
        $hospitalization->patient_id = $patient->id;
        $hospitalization->save();

        $behavior = BehavioralProblem::find($id);
        $behavior->behavior = $request->behavior;
        $behavior->patient_id = $patient->id;
        $behavior->save();

        $otherIllness = OtherIllness::find($id);
        $otherIllness->other_illness = $request->otherIllness;
        $otherIllness->patient_id = $patient->id;
        $otherIllness->save();

//////////end History Illness data /////////////////////

        if($patient->patient_role == "Student"){
            foreach($request->vaccines as $vaccine){
                Immunization::update([
                    'vaccine_id' => $vaccine,
                    'patient_id' => $patient->id,
                ]);
            }
        }
        elseif($patient->patient_role == "Employee"){
            $maintenance = Maintenance::find($id);
            $maintenance->medication_name = $request->medication_name;
            $maintenance->dosage = $request->dosage;
            $maintenance->frequency = $request->frequency;
            $maintenance->patient_id = $patient->id;
            $maintenance->save();
        }

        return redirect()->back();
    }

    public function archive($id, Request $request){
        $patient = PatientProfile::find($id);
        $patient->archived = 1;
        $patient->save();
        
        return redirect()->back();
    }
    // public function destroy($id){

    // }

    // public function importForm(){
    //     return view('pages.student-health-data');
    // }
}
