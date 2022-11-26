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

    public function __construct(string $location = null,string $start = null,string $end = null)
    {
        $this->location = $location;
        $this->start = $start;
        $this->end = $end;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        // fetch data on db  to export on excell
        if ($this->location == null)
        {
            return Approve::all();
        }
        else if ($this->location == "all")
        {
            return Approve::all();
        }
        else 
        {
            return collect(DB::select('SELECT * FROM approves WHERE destination = ? AND ap_date >= ? AND ap_date <= ?',[$this->location,$this->start,$this->end]));
        }
       
    }

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

    public function headings(): array
    {
        return [
            'ID',
            'LAST NAME',
            'FIRST NAME',
            'GENDER',
            'CONTACT',
            'EMAIL',
            'ADDRESS',
            'DESTINATION',
            'BOOK NUMBER',
            'GROUPS',
            'APPROVE DATE TIME',
        ];
    }

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
}
