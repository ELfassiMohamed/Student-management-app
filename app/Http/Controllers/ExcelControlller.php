<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UsersImport;
USE App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class ExcelControlller extends Controller
{
    public function import(Request $request)
    {
       
        Excel::import(new UsersImport, 'users.xlsx');
          return redirect('admin.index');  
        
         
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
}


