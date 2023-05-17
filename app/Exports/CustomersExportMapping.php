<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Database\Eloquent\Model;

class CustomersExportMapping implements FromCollection, WithMapping
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Purchase::with('Customer')->get();
    }

    public function map($purchase): array
    {
        return [
            $purchase->id,
            $purchase->number,
            // $purchase->customer->firstname . ' ' . $purchase->customer->lastname,
            $purchase->customer->email,
            // $purchase->bank_acc_number,
            // $purchase->company,
            $purchase->created_at->toDateString(),
            $purchase->updated_at->toDateString(),
        ];
    }
}
