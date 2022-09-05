<?php

namespace App\Exports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   

    /**
    * @return \Illuminate\Support\Collection
    */    public function collection()
    {
        $records = ['0x67361A524Df98Af1dE26808E27d0E74A1F0b7a4F'=>'10',
                    '0x8B14BEb458b885de64A16e5e9576729da38A28D0'=>'50',
                    '0xcD43d0BD50B26F2E0064F77114DD0e5528c456d8'=>'100',
                    '0xd360056DC45ab107d283c785ACdb87Efd4323646'=>'200'
                ];

        $result = array();

        for($i=1;$i<=125;$i++){

            foreach($records as $key => $value){
                $result[] = array('userid' => $key, 'amount' => $value);
             }
        }
        
        return collect($result);
    }

    public function headings(): array
    {
       return [
         
         'UserId',
         'Amount',
      
       ];
    }
}
