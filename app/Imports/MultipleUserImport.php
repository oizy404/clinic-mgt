<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class MultipleUserImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($rows as $row) 
        {
            $patient = User::create([
                'username' => $row['User Name'],
                'email' => $row['Email'],
                'password' => Hash::make($row['Password']),
            ]);
        }
    }
}
