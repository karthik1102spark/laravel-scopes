<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Exports\EmployeesByAgeExport;
use Excel;
use App\Models\User;
class EmployeesController extends Controller
{
    public function index(){
       return view('index');
    }

    // Excel Export
    public function exportExcel(){
       $file_name = 'records-'.date('Y_m_d_H_i_s').'.xlsx';
       return Excel::download(new EmployeesExport, $file_name);
    }

    public function statusRecords(){
      
      //local scope
      $users = User::status()->get();  // User::where('status',1)->get();

      //local dynamic scope
      $users = User::status(2)->get(); // User::where('status',1)->get(); (OR) User::where('status',0)->get(); (OR) User::where('status',2)->get();

      // global scope
      $users = User::select('name')->get(); //where status=1 //UserController@index
      $admins = Admin::select('name')->get(); //where status=1 //AdminController@index
      $developers = Developers::select('name')->get(); //where status=1 //DeveloperController@index

      //not applying global scopes
      $users = User::select('name')->withoutGlobalScope(ActiveScope::class)->get();  //      $users = User::select('name')->get();
      $employees = Employee::select('name')->withoutGlobalScope(ActiveScope::class)->get();
      $developers = Developers::select('name')->withoutGlobalScope(ActiveScope::class)->get();

    }
}