<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function create(){
    	return ('success');
    }

    public function store(Request $request){
    	// Excel::import(new EmployeeImport(), $request()->file('importfile'));

		$path1 = $request->file('importfile')->store('agents'); 
		$path=storage_path('app').'/'.$path1;  
		$data = \Excel::import(new EmployeeImport,$path);
    	return redirect()->back();

        // return redirect()->back();
    }
	public function export() 
    {
        
        return Excel::download(new EmployeeExport, 'Employee.xlsx');
    }
}
