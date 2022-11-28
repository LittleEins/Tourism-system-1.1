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

    public function __construct(string $location = null,string $start = null,string $end = null, int $sheetCount = null)
    {
        $this->location = $location;
        $this->start = $start;
        $this->end = $end;
        $this->sheetCount = $sheetCount;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $res = collect(DB::select('SELECT * FROM approves JOIN group_approves ON approves.book_number = group_approves.book_number WHERE destination = ? AND ap_date >= ? AND ap_date <= ?',[$this->location,$this->start,$this->end]));
    //    $res = collect(DB::select('SELECT * FROM approves INNER JOIN group_approves ON approves.book_number = group_approves.book_number'));
  
       
    // return  Approve::join('group_approves', 'approves.book_number', '=', 'group_approves.book_number')->get();
    if ($this->sheetCount == "0")
    {
        return $res = Approve::with('ap_group')->get();
    }
    else
    {

        return $res2 = Group_approve::get();
        // $res = Approve::with('ap_group')->get();
        // $count3 = Approve::with('ap_group')->count();
       
        // for ($y = 0; $y<=1;$y++)
        // {
        //     $count2 = $res[$y]->ap_group->count();
        //     for ($i=0; $i<=1; $i++)
        //     {
        //         for ($z = 0; $z <= 1; $z++)
        //         {
                
        //             // $arr = array();
        //             // array_push($arr, $res[$i]->ap_group[$z]);
        //             echo($res[$i]->ap_group[$z]);
        //             break;
        //         }
                
        //     }
        // }
    
        // return collect($arr);
        // dd($arr);
    }
        
   
//         SELECT table1.column1, table2.column2...
// FROM table1
// FULL JOIN table2
// ON table1.common_field = table2.common_field
      
        // fetch data on db  to export on excell
        // if ($this->location == null)
        // {
        //     return Approve::with('book_number')->get();
        //     // return Approve::all();
        // }
        // else if ($this->location == "all")
        // {
        //     return Approve::with('book_number')->get();
        //     // return Approve::all();
        // }
        // else 
        // {
        //     return Approve::with('book_number')->get();
        //     // return collect(DB::select('SELECT * FROM approves WHERE destination = ? AND ap_date >= ? AND ap_date <= ?',[$this->location,$this->start,$this->end]));
        // }
       
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
