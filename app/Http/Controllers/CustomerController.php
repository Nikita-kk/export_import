<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use Dompdf\Dompdf;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExport;
use App\Exports\CustomersExportautosize;
use App\Exports\CustomersExportDateformat;
use App\Exports\CustomersExportHeading;
use App\Exports\CustomersExportMapping;
use App\Exports\CustomersExportSheets;
use App\Exports\CustomersExportSize;
use App\Exports\CustomersExportStying;
use App\Exports\CustomersExportView;
use App\Imports\CustomersImportDateformat;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class CustomerController extends Controller

{
    public function customer(){
       $data = Customer::all();
        return view('table',compact('data'));
    }

    public function export(){
        return Excel::download(new CustomersExport(),'Customer.xlsx');
    }

    public function export_view(){
        return Excel::download(new CustomersExportView(),'Customer.xlsx');
    }

    public function export_store()
    {
        Excel::store(new CustomersExport(), 'Customer-' . now()->toDateString() . '.xlsx');

        return 'ok';
    }

    public function export_format($format)
{
    $extension = strtolower($format);
    if (in_array($extension, ['mpdf', 'dompdf', 'tcpdf'])) {
        $extension = 'pdf';
    }

    return Excel::download(new CustomersExport(), 'Customer.' . $extension, $format);
}

public function export_sheets(){
    return Excel::download(new CustomersExportSheets(),'Customer.xlsx');
}

public function export_heading(){
    return Excel::download(new CustomersExportHeading(),'Customer.xlsx');
}

public function export_mapping(){
    return Excel::download(new CustomersExportMapping(),'Customer.xlsx');
}

public function export_stying(){
    return Excel::download(new CustomersExportStying(),'Customer.xlsx');
}

public function export_autosize(){
    return Excel::download(new CustomersExportSize(),'Customer.xlsx');
}

public function export_dateformat(){
    return Excel::download(new CustomersExportDateformat(),'Customer.xlsx');
}

    // for Import

    public function import(){
        Excel::import(new CustomersImport(), request()->file('import'));
        return redirect()->route('table')->with('success', 'Successfully imported.');
    }

    public function import_dateformat(){
        Excel::import(new CustomersImportDateformat(), request()->file('import'));
        return redirect()->route('table')->with('success', 'Successfully imported.');
    }
}
