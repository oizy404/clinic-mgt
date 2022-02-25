<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;

use Excel;

class StudentBatchController extends Controller
{
    public function importForm(){
        return view('pages.health-data');
    }
    public function import(Request $request){

        Excel::import(new StudentImport, $request->file);
        echo "<script> alert('Records are imported successfully'); </script>";
        return view('pages.health-data');
    }
}
