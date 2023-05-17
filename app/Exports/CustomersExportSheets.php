<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CustomersExportSheets implements WithMultipleSheets
{

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets=[];

        $organsations=['example.net','example.com','example.org'];

        foreach ($organsations as $organsation){
            $sheets[]=new CustomersOrganisationSheet($organsation);
          }
          return $sheets;


        
    }
}
