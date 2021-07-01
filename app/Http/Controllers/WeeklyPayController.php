<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeekPay;

class WeeklyPayController extends Controller
{
    public function store(Request $request)
    {
        WeekPay::insert([
            'colors' => $request->colors,
            'wdays' => $request->wdays,
            'weekDate' => $request->weekDate,
            'e_w_date' => $request->e_w_date,
            'e_w_f_date' => $request->e_w_f_date,
            'month_fifteen' => $request->month_fifteen,
            'month_f_interm_day' => $request->month_f_interm_day,
            'half_month_date' => $request->half_month_date,
            'month_end_v' => $request->month_end_v,
            'month_end_day' => $request->month_end_day,
            'month_end_date' => $request->month_end_date,
            't_l_d' => $request->t_l_d,
            't_m_d' => $request->t_m_d,
            'twice_month_date' => $request->twice_month_date,
        ]);
        return back()->with('success','Data Insert Succesfully');
    }
}
