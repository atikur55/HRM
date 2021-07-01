<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use PDF;
use Carbon\Carbon;

class PersonalPayrollController extends Controller
{
    public function view_employee_payroll()
    {
    	// $single_payroll = User::where('id',Auth::id())->first();
    	$single_payroll = DB::table('users')->where('id',Auth::id())->first();
    	// print_r($single_payroll);die();
    	$employee_ref = $single_payroll->reference;

    	$get_employee_payroll = DB::table('payroll')->where('reference', $employee_ref)->get();
    	
    	return view('personal.payroll.index',compact('get_employee_payroll'));
    }
    public function emp_payroll_download($payroll_id)
    {
      $emp_payroll = DB::table('payroll')->where('id',$payroll_id)->first();
      
      $payroll_pdf = PDF::loadView('personal.employee.download.payroll',compact('emp_payroll'));

      $dynamic_name = "payroll-".$emp_payroll->id.'_'.Carbon::now()->format('d-m-Y').".pdf";
      return $payroll_pdf->download($dynamic_name);
    }
}
