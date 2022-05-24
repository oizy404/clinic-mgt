<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use App\Models\Event;
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
use App\Models\Illness;
use App\Models\HistoryIllness;
use App\Models\Allergy;
use App\Models\Fracture;
use App\Models\Operation;
use App\Models\Hospitalization;
use App\Models\BehavioralProblem;
use App\Models\OtherIllness;
use App\Models\Immunization;
use App\Models\Vaccine;
use App\Models\Maintenance;
use App\Models\Remark;
use Alert;

class PatientUserController extends Controller
{
    
    public function index(){
        $users = User::all();
        $messages = Message::orderBy('created_at', 'asc')->get();

        Alert::success('Welcome Patient','Clinic Management System');
        return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    }

    public function patientView(){

        $messages = Message::orderBy('created_at', 'asc')->get();

        $userProfiles = PatientProfile::where('user_id', Auth::id())->value('user_id');

        if($userProfiles == Auth::id()){
            $userProfile = PatientProfile::where('user_id',$userProfiles)->get();

            foreach($userProfile as $patient){

                $deseases = Desease::all();
                $vaccines = Vaccine::all();
                $illnesses = Illness::all();

                return view("pages.patient.view-health-data")->with(compact(
                    "messages", $messages,
                    "patient", $patient,
                    "deseases", $deseases,
                    "vaccines", $vaccines,
                    "illnesses", $illnesses,
                ));

            }
        }
        else{
            $messages = Message::orderBy('created_at', 'asc')->get();

            $patients = PatientProfile::all();
            $provinces = Province::all();

            return view("pages.patient.add-health-data", compact(
            "messages", $messages,
            "patients",$patients,
            "provinces",$provinces));
        }
        
    }

    public function insert(Request $request){

        $patient = new PatientProfile();
        $patient->user_id = Auth::id();
        $patient->school_id = $request->idnumber;
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
        // dd($patient);
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

        $guardian = new Guardian();
        $guardian->complete_name = $request->GName;
        $guardian->relationship = $request->GRelationship;
        $guardian->contact_number = $request->GContactNo;
        $guardian->patient_id = $patient->id;
        $guardian->save();

        $location = new Location();
        $location->street_address = $request->streetAdd;
        $location->barangay = $request->barangay;
        $location->city_id = $request->city;
        $location->guardian_id = $guardian->id;
        $location->save();

        $sibling = new Sibling();
        $sibling->complete_name = $request->siblingComplete_name;
        $sibling->age = $request->siblingAge;
        $sibling->sex = $request->siblingSex;
        $sibling->patient_id = $patient->id;
        $sibling->save();

//////////start Desease data /////////////////////
        if($request->deseases){
            foreach($request->deseases as $desease){
                $familyDesease = FamilyDesease::create([
                    'desease_id' => $desease,
                    'patient_id' => $patient->id,
                ]);
            }  
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

        if($request->illnesses){
            foreach($request->illnesses as $illness){
                $historyIllness = HistoryIllness::create([
                    'illness_id' => $illness,
                    'patient_id' => $patient->id,
                ]);
            }
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
        elseif($patient->patient_role == "Employee" || $patient->patient_role == "Visitor"){
            $maintenance = new Maintenance();
            $maintenance->medication_name = $request->medication_name;
            $maintenance->dosage = $request->dosage;
            $maintenance->frequency = $request->frequency;
            $maintenance->patient_id = $patient->id;
            $maintenance->save();
        }
        $remark = new Remark();
        $remark->remark = $request->remark;
        $remark->patient_id = $patient->id;
        $remark->save();

        return redirect()->route('viewHealthData');
    }

    public function patientEdit($id){
        $messages = Message::orderBy('created_at', 'asc')->get();

        $patient = PatientProfile::find($id);
        $deseases = Desease::all();
        $vaccines = Vaccine::all();
        $illnesses = Illness::all();

        return view("pages.patient.edit-health-data")->with(compact(
            "messages", $messages,
            "patient", $patient,
            "deseases", $deseases,
            "vaccines", $vaccines,
            "illnesses", $illnesses,
        ));

    }

    public function patientUpdate(Request $request, $id){

        $patient = PatientProfile::find($id);
        $patient->school_id = $request->idnumber;
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

        $parent = ParentModel::where('patient_id',$patient->id)->first();
        $parent->complete_name = $request->fatherComplete_name;
        $parent->relationship = $request->fatherRelationship;
        $parent->birthday = $request->fatherBirthday;
        $parent->contact_number = $request->fatherContact_number;
        $parent->occupation = $request->fatherOccupation;
        $parent->employment_address = $request->fatherEmployment_address;
        $parent->patient_id = $patient->id;

        // dd($parent);
        $parent->save();

        $parent = ParentModel::where('patient_id',$patient->id)->first();
        $parent->complete_name = $request->motherComplete_name;
        $parent->relationship = $request->motherRelationship;
        $parent->birthday = $request->motherBirthday;
        $parent->contact_number = $request->motherContact_number;
        $parent->occupation = $request->motherOccupation;
        $parent->employment_address = $request->motherEmployment_address;
        $parent->patient_id = $patient->id;
        $parent->save();

        $guardian = Guardian::where('patient_id',$patient->id)->first();
        $guardian->complete_name = $request->GName;
        $guardian->relationship = $request->GRelationship;
        $guardian->contact_number = $request->GContactNo;
        $guardian->patient_id = $patient->id;
        $guardian->save();

        $location = Location::where('guardian_id',$guardian->id)->first();
        $location->street_address = $request->streetAdd;
        $location->barangay = $request->barangay;
        $location->city_id = $request->city;
        $location->guardian_id = $guardian->id;
        $location->save();

        $sibling = Sibling::where('patient_id',$patient->id)->first();
        $sibling->complete_name = $request->siblingComplete_name;
        $sibling->age = $request->siblingAge;
        $sibling->sex = $request->siblingSex;
        $sibling->patient_id = $patient->id;
        $sibling->save();

//////////start Desease data /////////////////////
        $familyDesease = FamilyDesease::where('patient_id',$patient->id)->get();
        foreach($familyDesease as $family_desease){
            $f_desease = FamilyDesease::find($family_desease->id);
            $f_desease->delete();
        }

        foreach($request->deseases as $desease){
            $f_desease = FamilyDesease::create([
                'desease_id' => $desease,
                'patient_id' => $patient->id,
            ]);
            
        }
        $cancer = Cancer::where('patient_id',$patient->id)->first();
        $cancer->cancer = $request->cancer;
        $cancer->patient_id = $patient->id;
        $cancer->save();

        $otherDesease = OtherDesease::where('patient_id',$patient->id)->first();
        $otherDesease->other_desease = $request->otherDesease;
        $otherDesease->patient_id = $patient->id;
        $otherDesease->save();

//////////end Desease data /////////////////////

//////////start History Illness data /////////////////////
        $historyIllness = HistoryIllness::where('patient_id',$patient->id)->get();
        foreach($historyIllness as $history_illness){
            $h_illness = HistoryIllness::find($history_illness->id);
            $h_illness->delete();
        }
        foreach($request->illnesses as $illness){
            HistoryIllness::create([
                'illness_id' => $illness,
                'patient_id' => $patient->id,
            ]);
        }
        $allergy = Allergy::where('patient_id',$patient->id)->first();
        $allergy->allergy = $request->allergy;
        $allergy->patient_id = $patient->id;
        $allergy->save();

        $fracture = Fracture::where('patient_id',$patient->id)->first();
        $fracture->fracture = $request->fracture;
        $fracture->patient_id = $patient->id;
        $fracture->save();

        $operation = Operation::where('patient_id',$patient->id)->first();
        $operation->operation = $request->operation;
        $operation->patient_id = $patient->id;
        $operation->save();

        $hospitalization = Hospitalization::where('patient_id',$patient->id)->first();
        $hospitalization->hospitalization = $request->hospitalization;
        $hospitalization->patient_id = $patient->id;
        $hospitalization->save();

        $behavior = BehavioralProblem::where('patient_id',$patient->id)->first();
        $behavior->behavior = $request->behavior;
        $behavior->patient_id = $patient->id;
        $behavior->save();

        $otherIllness = OtherIllness::where('patient_id',$patient->id)->first();
        $otherIllness->other_illness = $request->otherIllness;
        $otherIllness->patient_id = $patient->id;
        $otherIllness->save();

// //////////end History Illness data /////////////////////

        if($patient->patient_role == "Student"){
            $immunizations = Immunization::where('patient_id',$patient->id)->get();
            foreach($immunizations as $immunization){
                $immunization_ = Immunization::find($immunization->id);
                $immunization_->delete();
            }            
            foreach($request->vaccines as $vaccine){
                Immunization::create([
                    'vaccine_id' => $vaccine,
                    'patient_id' => $patient->id,
                ]);
            }
        }
        elseif($patient->patient_role == "Employee" || $patient->patient_role == "Visitor"){
            $maintenance = Maintenance::where('patient_id',$patient->id)->first();
            $maintenance->medication_name = $request->medication_name;
            $maintenance->dosage = $request->dosage;
            $maintenance->frequency = $request->frequency;
            $maintenance->patient_id = $patient->id;
            $maintenance->save();
        }

        return redirect()->route('viewHealthData');
    }

    public function insertPatientMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){

            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->readmsg = 0;
        $message->receiver = 2;
        $message->save();

        return redirect()->back();
    }
}
