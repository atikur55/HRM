<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeFileController extends Controller
{
  $single_payroll = DB::table('users')->where('id',Auth::id())->first();
  // print_r($single_payroll);die();
  

  return view('contractview');
}
