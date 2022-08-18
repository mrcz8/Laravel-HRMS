<?php

namespace App\Exports;

use App\Models\Agent;
use App\Models\Benefit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use DB;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Agent::all();
        // return Benefit::all();
        return DB::table('agents')
        ->rightjoin('benefits', 'benefits.agent_id', '=', 'agents.id')
        ->rightjoin('contact_persons', 'contact_persons.agent_id', '=', 'agents.id')
        ->get();
    }
    public function headings() : array
   {
       //Put Here Header Name That you want in your excel sheet 
       return [
           'id',
           'Bio#',
           'Employee Number',
           'Name',
           'Address',
           'Contact Number',
           'Date Hired', 
           'Date of Birth',
           'Account',
           'Contract',
           'Status',
           'Status info',
           'Created At',
           'Updated At',
           'Agent Id',
           'TIN',
           'SSS',
           'PHILHEALTH',
           'PAGIBIG',
           'Person In Case Of Emergency',
           'Relationship',
           'Address',
           'Number',


       ]; 
   } 
}
