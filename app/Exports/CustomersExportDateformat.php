<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExportDateformat implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }
    /**
     *@var Customer $customer
     *@return array
     */

     public function map($customer): array
     {
        return[
            $customer->id,
            $customer->firstname,
            $customer->lastname,
            $customer->email,
            $customer->created_at->format('d/m/y H:i:s'),
            $customer->updated_at->format('d/m/y H:i:s'),

        ];
     }
}
