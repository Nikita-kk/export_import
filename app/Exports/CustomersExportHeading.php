<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PHPUnit\TextUI\Configuration\Merger;
use PHPUnit\TextUI\Configuration\TestDirectoryCollection;

class CustomersExportHeading implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    // $customers = Customer::all();
    // $finalCollection = [];
    // foreach ($customers->chunk(3) as $chunk) {
    //     $finalCollection = array_merge($finalCollection, $chunk->toArray());


    return Customer::select(DB::raw("'', id, firstname, lastname, email, created_at, updated_at"))
    ->get();
}


    public function headings(): array
    {
        return [
            '',
            '#',
            'Firstname',
            'Lastname',
            'Email',
            'Created_at',
            'Updated_at'
        ];
    }
}
