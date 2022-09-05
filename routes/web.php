<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//export records as excel file
Route::get('employees/exportexcel', [EmployeesController::class, 'exportExcel'])->name('employees.exportexcel');

//scopes
Route::get('statusRecords', [EmployeesController::class, 'statusRecords']);

