<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ImportExportController extends Controller
{
    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx,csv'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if ($data->count() > 0) {
            foreach ($data->toArray() as $key => $value) {
                foreach ($value as $row) {
                    $insert_data[] = array(
                        'name' => $row['Nom'],
                        'prenom' => $row['Prénom'],
                        'cne' => $row['CNE'],
                        'unv' => $row['Etablissement'],
                        'email' => $row['Email'],
                        'filiere' => $row['Filière'],
                        'role' => $row['Role']
                    );
                }
            }

            if (!empty($insert_data)) {
                DB::table('users')->insert($insert_data);
            }
        }
        return back();
    }
}
