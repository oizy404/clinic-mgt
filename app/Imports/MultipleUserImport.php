<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MultipleUserImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user = new User();
            $user->username = $row['username'];
            $user->email = $row['email'];
            $user->password = Hash::make($row['password']);
            $user->rank = 'patient';
            $user->save();
        }
    }
}
