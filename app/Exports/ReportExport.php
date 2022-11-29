<?php

namespace App\Exports;

use App\Models\Approve;
use App\Models\Group_approve;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class ReportExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    private $location;
    public $start;
    public $end;
    public $sheetCount;

    public function __construct(string $location = null,string $start = null,string $end = null, int $sheetCount)
    {
        $this->location = $location;
        $this->start = $start;
        $this->end = $end;
        $this->sheetCount = $sheetCount;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // Quering Data to sheet
    public function collection()
    {
        if ($this->location == "all" || $this->location == null)
        {
            dd("all");
        }
        else
        {
            dd("not all");
        }
        
    }

    // Mapping data want to put on sheet
    public function map($approve): array
    {
     
        return [
            $approve->id,
            $approve->last_name,
            $approve->first_name,
            $approve->gender,
            $approve->phone,
            $approve->email,
            $approve->address,
            $approve->destination,
            $approve->book_number,
            $approve->groups,
            $approve->approve_td,

        ];
    }

    // Headings for Sheet
    public function headings(): array
    {
        return [
            'LAST NAME',
            'FIRST NAME',
            'GENDER',
            'CONTACT',
            'EMAIL',
            'ADDRESS',
            'DESTINATION',
            'BOOK NUMBER',
            'Date of Arrival',
        ];
    }

    // font or style on sheet
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => [
                        'bold' =>true
                    ]
                ]);
            }
        ];
    }

    // Sheet naming
    // public function title(): stream_set_blocking
    // {
       
    // }
}
