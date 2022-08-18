<?php

namespace App\Imports;

use App\Models\Agent;
use App\Models\Benefit;
use App\Models\Contact_person;
use App\Models\Account;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToCollection
{
    // private $agents;
   
    public function __construct(){
        $this->agents=Agent::all();

    }
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $agents = Agent::create([
                'bio_no' => $row[0],
                'emp_no' => $row[1],
                'name' => $row[2],
                'address' => $row[3],
                'contact_no' => $row[4],
                'date_hired' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
                'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),

                'status' => $row[8],
            ]);
            
            $benefits = Benefit::create([
                'agent_id' => $agents->id,
                'tin' => $row[9],
                'sss' => $row[10],
                'philhealth' => $row[11],
                'pag_ibig' => $row[12],
            ]);
            $contact_persons = Contact_person::create([
                'agent_id' => $agents->id,
                'c_person' => $row[13],
                'relationship' => $row[14],
                'e_address' => $row[15],
                'e_contact' => $row[16],
            ]);
        }
    }
}
