<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStudent implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($session_id )
    {
        $this->session_id=$session_id;
    }
    public function collection()
    {
        return DB::table('session_students')->where('session_id')
                    ->join('students', 'session_students.CIN', '=', 'students.CIN')
                    ->select('students.first_name', 'students.last_name', 'students.CIN')
                    ->get();
    }

    public function headings(): array{
        return [
            "NOM",
            "PRENOM",
            "MATRICULE"
        ];
    }
}
