<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row 
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // tbl_patient_profiles_ibfk_1 patient_division_id
    public function model(array $row)
    {
        return new Student([
            'school_id' => $row['school_id'],
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'sex' => $row['sex'],
            'address' => $row['address'],
            'contact_number' => $row['contact_number'],
            'status' => $row['status'],
            'religion' => $row['religion'],
            'nationality' => $row['nationality'],
        ]);
    }
}
