<?php

namespace App\Exports;

use App\Models\Approve;
use App\Models\Group_approve;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GroupExport implements WithMultipleSheets
{
    private $location;
    private $start;
    private $end;

    public function __construct (string $location, string $start, string $end)
    {
        $this->location = $location;
        $this->start = $start;
        $this->end = $end;
    }

    public function sheets(): array
    {
        
        $sheets = [];

        for ($sheetCount = 0; $sheetCount <= 1; $sheetCount++)
        {
            $sheets[] = new ReportExport($this->location,$this->start,$this->end, $sheetCount);
        }

        return $sheets;

    }
}
