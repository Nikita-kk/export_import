<?php

namespace App\Imports;

use App\Models\Customer;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImportDateformat implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'firstname' =>$row[1],
            'lastname' =>$row[2],
            'email' =>$row[3],
            'created_at' => Carbon::createFromFormat('d/m/y H:i:s', $row[4])->toDateTimeString(),
            'updated_at' => Carbon::createFromFormat('d/m/y H:i:s', $row[5])->toDateTimeString(),

        ]);
    }
}
