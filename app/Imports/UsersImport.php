<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            "name" => $row['0'],
            "prenom" => $row['1'],
            "cne" => $row['2'],
            "unv" => $row['3'],
            "email" => $row['4'],
            "filiere" => $row['5'],
            "role" => $row['6'],
            
        ]);
    }

    
}
