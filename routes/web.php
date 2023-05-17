<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('customer',[CustomerController::class,'customer'])->name('table');



Route::get('customer/export',[CustomerController::class,'export'])->name('customer.export');

Route::get('customer/export_view',[CustomerController::class,'export_view'])->name('customer.export_view');

Route::get('customer/export_store',[CustomerController::class,'export_store'])->name('customer.export_store');

Route::get('customer/export_format/{format}',[CustomerController::class,'export_format'])->name('customer.export_format');

Route::get('customer/export_sheets',[CustomerController::class,'export_sheets'])->name('customer.export_sheets');

Route::get('customer/export_heading',[CustomerController::class,'export_heading'])->name('customer.export_heading');

Route::get('customer/export_mapping',[CustomerController::class,'export_mapping'])->name('customer.export_mapping');

Route::get('customer/export_stying',[CustomerController::class,'export_stying'])->name('customer.export_stying');

Route::get('customer/export_autosize',[CustomerController::class,'export_autosize'])->name('customer.export_autosize');

Route::get('customer/export_dateformat',[CustomerController::class,'export_dateformat'])->name('customer.export_dateformat');

// For Import

Route::post('customer/import',[CustomerController::class,'import'])->name('customer.import');

Route::post('customer/import_dateformat',[CustomerController::class,'import_dateformat'])->name('customer.import_dateformat');
