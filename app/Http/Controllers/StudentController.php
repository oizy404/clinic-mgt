<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Excel;

class StudentController extends Controller
{
    public function importForm(){
        return view('pages.student-health-data');
    }
    public function import(Request $request){

        Excel::import(new StudentImport, $request->file);
        echo "<script> alert('Record are fucking imported successfully'); </script>";
        return view('pages.student-health-data');
    }
}
