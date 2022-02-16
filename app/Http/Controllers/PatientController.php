<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use App\Imports\StudentImport;
use App\Models\BirthParent;
use App\Models\Sibling;
use App\Models\Guardian;
use App\Models\Location;
use App\Models\City;
use App\Models\Province;
use App\Models\FamilyDesease;
use App\Models\Desease;
use App\Models\Illness;
use App\Models\Vaccine;

use Excel;

class PatientController extends Controller
{
    public function import(Request $request){

        Excel::import(new StudentImport, $request->file);
        return back()->with('Records are imported successfully');
    }

    //STUDENTS PERSONAL INFORMATION
    public function index(){
        $patients = PatientProfile::all();
        $deseases = Desease::all();
        $illnesses = Illness::all();
        $vaccines = Vaccine::all();
        return view("pages.student-health-data")->with(compact("patients", $patients,
                                                                "deseases", $deseases,
                                                                "illnesses", $illnesses,
                                                                "vaccines", $vaccines));
    }

    public function insert(Request $request){

        // $tbl_student = Student::find(41);
        // dd($tbl_student->tbl_sibling());
        // dd($request->all());
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
                'desease_id' => $illness,
                'patient_id' => $patient->id,
            ]);
        }

        foreach($request->vaccines as $vaccine){
            Immunization::create([
                'desease_id' => $vaccine,
                'patient_id' => $patient->id,
            ]);
        }

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
