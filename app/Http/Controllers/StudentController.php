<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;

use Excel;

class StudentController extends Controller
{
    public function import(Request $request){

        Excel::import(new StudentImport, $request->file);
        return back()->with('Record are fucking imported successfully');
    }

    public function index(){
        $tbl_students = Student::all();
        return view("pages.student-health-data")->with("tbl_students", $tbl_students);
    }

    public function create(){
        return view("pages.student-health-data");
    }

    public function store(Request $request){

        $tbl_student = new Student();

        $tbl_student->id_number = $request->student_idnumber;
        $tbl_student->first_name = $request->first_name;
        $tbl_student->middle_name = $request->middle_name;
        $tbl_student->last_name = $request->last_name;
        $tbl_student->birthday = $request->birthday;
        $tbl_student->sex = $request->sex;
        $tbl_student->address = $request->address;
        $tbl_student->fb_account = $request->fb_account;
        $tbl_student->contact_number = $request->contact_number;
        $tbl_student->status = $request->status;
        $tbl_student->religion = $request->religion;
        $tbl_student->nationality = $request->nationality;
        $tbl_student->save();

        return redirect()->route('tbl_students.index');
    }
    public function show($id){
        
    }
    public function delete($id){

    }

    // public function importForm(){
    //     return view('pages.student-health-data');
    // }
    
}
