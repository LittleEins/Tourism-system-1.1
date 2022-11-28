<?php

namespace App\Exports;

use App\Models\Approve;
use App\Models\Group_approve;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GroupExport implements WithMultipleSheets
{
    private $year;

    public function __construct (string $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        
        $sheets = [];

        for ($month = 0; $month <= 1; $month++)
        {
            $sheets[] = new ReportExport($this->year, $month);
        }

        return $sheets;

    }
}
