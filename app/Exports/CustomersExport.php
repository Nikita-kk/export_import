<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();


    //   jr fkt fname , lname nd email pahije asel tr
        return Customer::select(['firstname','lastname','email'] )
        ->orderBy('firstname')

        ->get();
    }
}
