<?php

namespace App\Exports;

use App\Models\Approve;
use App\Models\Approves_manual;
use App\Models\Group_approve;
use App\Models\Group_manual_approve;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReportExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents, WithTitle
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
        if (($this->location == "all" || $this->location == null) && ($this->start == null && $this->end == null))
        {
            if ($this->sheetCount == "0")
            {
                return Approve::get();
            }
            else if ($this->sheetCount == "1")
            {
                return Group_approve::get();
            }
            else if ($this->sheetCount == "2")
            {
                return Approves_manual::get();
            } 
            else
            {
                return Group_manual_approve::get();
            }
        }
        else if (($this->location == "all" || $this->location == null) && ($this->start != null && $this->end != null))
        {
            if ($this->sheetCount == "0")
            {
                return Approve::whereBetween('ap_date',[$this->start,$this->end])->get();
            }
            else if ($this->sheetCount == "1")
            {
                return Group_approve::whereBetween('ap_date',[$this->start,$this->end])->get();
            }
            else if ($this->sheetCount == "2")
            {
                return Approves_manual::whereBetween('ap_date',[$this->start,$this->end])->get();
            } 
            else
            {
                return Group_manual_approve::whereBetween('ap_date',[$this->start,$this->end])->get();
            }
        }
        else
        {
            if (($this->start === null) && ($this->end === null))
            {
                if ($this->sheetCount == "0")
                {
                    return Approve::where('destination',ucfirst($this->location))->get();
                }
                else if ($this->sheetCount == "1")
                {
                    return Group_approve::where('destination',ucfirst($this->location))->get();
                }
                else if ($this->sheetCount == "2")
                {
                    return Approves_manual::where('destination',ucfirst($this->location))->get();
                } 
                else
                {
                    return Group_manual_approve::where('destination',ucfirst($this->location))->get();
                }
            }
            else
            {
                if ($this->sheetCount == "0")
                {
                    return Approve::where('destination',ucfirst($this->location))->whereBetween('ap_date',[$this->start,$this->end])->get();
                }
                else if ($this->sheetCount == "1")
                {
                    return Group_approve::where('destination',ucfirst($this->location))->whereBetween('ap_date',[$this->start,$this->end])->get();
                }
                else if ($this->sheetCount == "2")
                {
                    return Approves_manual::where('destination',ucfirst($this->location))->whereBetween('ap_date',[$this->start,$this->end])->get();
                } 
                else
                {
                    return Group_manual_approve::where('destination',ucfirst($this->location))->whereBetween('ap_date',[$this->start,$this->end])->get();
                }
            }
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
    public function title(): string
    {
        if ($this->sheetCount == "0")
        {
            return "System Approves";
        }
        else if ($this->sheetCount == "1")
        {
            return "System Approve Group";
        }
        else if ($this->sheetCount == "2")
        {
            return "Manual Approve";
        } 
        else
        {
            return "Manual Approve Groups";
        }
    }
}
