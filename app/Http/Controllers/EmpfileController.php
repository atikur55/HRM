<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Classes\table;
Use App\User;

class EmpfileController extends Controller
{
  public function index(){
    $single_payroll = DB::table('users')->where('id',Auth::id())->first();
    // print_r($single_payroll);die();
    $employee_ref = $single_payroll->id;

    $emp = DB::table('files')->where('emp_name', $employee_ref)->get();
    return view('contractview',compact("emp"));
  }

  public function download($file){
      // $file= public_path(). "/uploads/";

        return Response()->download('uploads/'.$file);
    }
}
