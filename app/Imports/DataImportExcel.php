<?php

namespace App\Imports;

use App\Models\PatientProfile;
use App\Models\Sibling;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImportExcel implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $patient = PatientProfile::create([
                'school_id' => $row['school_id'],
                'patient_role' => $row['patient_role'],
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'sex' => $row['sex'],
                'address' => $row['address'],
                'contact_number' => $row['contact_number'],
                'status' => $row['status'],
                'religion' => $row['religion'],
                'nationality' => $row['nationality'],
                'archived' == 0,
            ]);
            $patient->sibling()->create([
                'complete_name' => $row['complete_name'],
                'age' => $row['age'],
                'sex' => $row['sex'],
            ]);
        }
    }
}
