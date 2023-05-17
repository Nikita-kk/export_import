<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    *@return \Illuminate\Database\Eloquent\Model\null
    */
    public function model(array $row)
    {
        return new Customer([

                'firstname' => $row[1],
                'lastname' => $row[2],
                'email' => $row[3],
        ]);
    }

}

