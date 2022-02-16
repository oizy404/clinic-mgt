<?php

namespace App\Imports;

use App\Models\PatientProfile;
use App\Models\Sibling;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements WithHeadingRow,ToCollection
{

    // private $users;

    // public function __construct(){
    //     $this->users = User::select('id','username')->get();
    // }

    // /**
    // * @param array $row 
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */

    // public function model(array $row)
    // {
    //     // return new User([
    //     //     'username' => $row['username'],
    //     //     'password' => Hask::make($row['password']),
    //     //     'rank' => $row['rank'],
    //     // ]);
    //     $user = $this->users->where('school_id',$row['username'])->first();
    //     return new PatientProfile([
    //         'id' => $user->id ?? NULL,
    //         // 'school_id' => $row['school_id'],
    //         'first_name' => $row['first_name'],
    //         'middle_name' => $row['middle_name'],
    //         'last_name' => $row['last_name'],
    //         'sex' => $row['sex'],
    //         'address' => $row['address'],
    //         'contact_number' => $row['contact_number'],
    //         'status' => $row['status'],
    //         'religion' => $row['religion'],
    //         'nationality' => $row['nationality'],
    //     ]);
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $patient = PatientProfile::create([
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
            $patient->sibling()->create([
                'complete_name' => $row['complete_name'],
                'age' => $row['age'],
                'sex' => $row['sex'],
            ]);
        }
    }
}
