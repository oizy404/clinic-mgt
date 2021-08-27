<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyController extends Controller
{
    //STUDENTS FAMILY DATA
    public function indexParents(){
        $tbl_parents = BirthParent::all();
        return view("pages.student-health-data")->with("tbl_parents", $tbl_parents);
    }
    public function insertParents(){

        $tbl_parent = new BirthParent();

        $tbl_parent->complete_name = $request->FName;
        $tbl_parent->birthday = $request->FBirthdate;
        $tbl_parent->contact_number = $request->FContactNo;
        $tbl_parent->occupation = $request->FOccupation;
        $tbl_parent->employment_address = $request->FEmploymentAdd;

        $tbl_parent->complete_name = $request->MName;
        $tbl_parent->birthday = $request->MBirthdate;
        $tbl_parent->contact_number = $request->MContactNo;
        $tbl_parent->occupation = $request->MOccupation;
        $tbl_parent->employment_address = $request->MEmploymentAdd;

        return redirect()->route('student-health-data');
    }
    // public function showParents(){

    // }
    // public function editParents(){

    // }
    // public function updateParents(){

    // }
    // public function destroyParents(){

    // }
    
    public function indexGuardian(){
        $tbl_guardians = Guardian::all();
        return view("pages.student-health-data")->with("tbl_guardians", $tbl_guardians);
    }
    public function insertGuardian(){

        $tbl_guardian = new Guardian();

        $tbl_guardian->complete_name = $request->GName;
        $tbl_guardian->relationship = $request->GRealationship;
        $tbl_guardian->contact_number = $request->GContactNo;
        $tbl_guardian->address = $request->GAddress;

        return redirect()->route('student-health-data');
    }
    // public function showGuardian(){

    // }
    // public function editGuardian(){

    // }
    // public function updateGuardian(){

    // }
    // public function destroyGuardian(){

    // }

    public function indexSibling(){
        $tbl_siblings = Sibling::all();
        return view("pages.student-health-data")->with("tbl_siblings", $tbl_siblings);
    }
    public function insertSibling(){

        $tbl_sibling = new Sibling();

        $tbl_sibling->sibling_info = $request->sibling_info;

        return redirect()->route('student-health-data');
    }
    // public function showSibling(){

    // }
    // public function editSibling(){

    // }
    // public function updateSibling(){

    // }
    // public function destroySibling(){

    // }
}
