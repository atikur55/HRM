<?php
/*
* Workday - A time clock application for employees
* Email: official.codefactor@gmail.com
* Version: 1.1
* Author: Brian Luna
* Copyright 2020 Codefactor
*/
namespace App\Http\Controllers\admin;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function index(Request $request) 
    {
        
        if (permission::permitted('dashboard')=='fail'){ return redirect()->route('denied'); }
        
        $datenow = date('Y-m-d'); 
        // $is_online = table::attendance()->where('date', $datenow)->pluck('idno')->pluck('status_timein')->pluck('status_timeout');

         /* My code */
         $is_timein = table::attendance()->where('date', $datenow)->pluck('status_timein');

        
         $is_timein_arr = json_decode(json_encode($is_timein), true);
 
        
         $is_timein_now = count($is_timein);

         $is_timeout = table::attendance()->where('date', $datenow)->pluck('status_timeout');

        
         $is_timeout_arr = json_decode(json_encode($is_timeout), true);
 
        
         $is_timeout_now = count($is_timeout);

        
    
        
        /* ./My code */

        $is_online = table::attendance()->where('date', $datenow)->pluck('idno');

        
        $is_online_arr = json_decode(json_encode($is_online), true);

       

    

        $is_online_now = count($is_online); 

        $emp_ids = table::companydata()->pluck('idno');
        $emp_ids_arr = json_decode(json_encode($emp_ids), true); 
        $is_offline_now = count(array_diff($emp_ids_arr, $is_online_arr));
        $tf = table::settings()->value("time_format");
        
		$emp_all_type = table::people()
        ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
        ->join('tbl_people_attendance', 'tbl_people.id', '=', 'tbl_people_attendance.reference')
        ->where('tbl_people.employmentstatus', 'Active')
        ->where('tbl_people_attendance.date', $datenow)
        ->orderBy('tbl_company_data.startdate', 'desc')
        //->take(8)
        ->get();

        $emp_all = table::people()
        ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
        ->join('tbl_people_attendance', 'tbl_people.id', '=', 'tbl_people_attendance.reference')
        ->where('tbl_people.employmentstatus', 'Active')
        ->where('tbl_people_attendance.date','<>', $datenow)    
        ->orderBy('tbl_company_data.startdate', 'desc')                
        //->take(8)
        ->distinct('tbl_people.id')
        ->get();
        // dd($emp_all);

		$emp_typeR = table::people()
        ->where('employmenttype', 'Regular')
        ->where('employmentstatus', 'Active')
        ->count();

		$emp_typeT = table::people()
        ->where('employmenttype', 'Trainee')
        ->where('employmentstatus', 'Active')
        ->count();

		$emp_allActive = table::people()
        ->where('employmentstatus', 'Active')
        ->count();

        $a = table::attendance()
        ->latest('date')
        ->where('date',$datenow)
        ->get();
        
        $emp_approved_leave = table::leaves()
        ->where('status', 'Approved')
        ->orderBy('leavefrom', 'desc')
        ->take(8)
        ->get();

		$emp_leaves_approve = table::leaves()
        ->where('status', 'Approved')
        ->count();

		$emp_leaves_pending = table::leaves()
        ->where('status', 'Pending')
        ->count();

		$emp_leaves_all = table::leaves()
        ->where('status', 'Approved')
        ->orWhere('status', 'Pending')
        ->count();

        $exp = DB::table('expense')->get();
        $pay = DB::table('payroll')->get();


         /* year wise graph data in single array start */
        $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        // $grouped = DB::table('expense')
        // ->select(
        //     DB::raw('count(id) as data'), 
        //     DB::raw("DATE_FORMAT(expense_date, '%m-%Y') new_date"),  
        //     DB::raw('YEAR(expense_date) year, MONTH(expense_date) month')
        //     )
        // ->groupBy('year','month')
        // ->get();

        
        $grouped = DB::table('expense')
        ->select(
            DB::raw('count(id) as data'),
            DB::raw('MONTH(expense_date)'),
            DB::raw("YEAR(expense_date)"),  
            DB::raw('SUM(total_expense) AS total')
            )
          
           ->groupByRaw('MONTH(expense_date)')
           ->groupByRaw('YEAR(expense_date)')
           ->where( DB::raw('YEAR(expense_date)'),'2020')
           ->orderBy('MONTH(expense_date)','asc')
            ->get();
            $tot = [];
            $arr = [];
     foreach($grouped as $k){
       
        $tot[$k->{'MONTH(expense_date)'}] = $k->total;
     }
    
        //    echo '<br>-----<br>';
        //      echo '<pre>';
        //              print_r($grouped);
        //      echo '</pre>';
        //    echo '<pre>';
        //         print_r($tot);
        //    echo '</pre>';

           $arrtot = [];

       for($i = 0;$i<=11;$i++){
            if(isset($tot[$i+1])){
            $arrtot[$i] = $tot[$i+1];
            }else{
                $arrtot[$i] = 0;

            }
       }
    //    echo '<pre>';
    //    print_r($arrtot);
    //     echo '</pre>';
  

        //    echo $grouped->total.'<br>';
        //    echo $grouped->year.'<br>';
        //    echo $grouped->month.'<br>';
        //    echo '<br>-----<br>';
        // die();

        // $grouped = DB::table('expense')
        //         ->selectRaw('
        //             SUM(total_expense) AS type_a
        //         ')
        //         ->groupByRaw('MONTH(expense_date)')
        //         ->get();
        // dd($grouped);die();
       /* year wise graph data in single array end */ 



        $expsum = 0;
        $expyear = '';
        $expmonth = '';

        $exparr = array();
        $i = 0;
        foreach($exp as $e){
           $carbon = Carbon::parse($e->expense_date);
     
        //    echo '<br>-----<br>';
        //    echo $carbon->shortEnglishMonth;
        //    echo $carbon->year;
        //    echo '<br>-----<br>';
        /*
        0 = Jan
        1 = Feb
        2 = Mar
        3= Apr
        4 = May
        5 = Jun
        6 = Jul
        7 = Aug
        8 = Sep
        9 = Oct
        10 = Nov
        11 = Dec
        */
            

           if(  $expyear ==  $carbon->year){
                if( $expmonth ==  $carbon->shortEnglishMonth){
                    $expsum =   $expsum + $e->total_expense;
                 
                }else{
                    $expsum = $e->total_expense;
                }
             
           }else{
            $expsum = $e->total_expense;
           }
          
            $expyear = $carbon->year;
            $expmonth = $carbon->shortEnglishMonth;
            if(1){}
            $exparr["$expmonth"."_"."$expyear"] = $expsum;
            
        //    echo '   <br>-----<br>';
        //    echo $expsum;
         
        //    echo '   <br>-----<br>';
       
        
        }
        // echo '<br>-----<br>';
        // echo '<pre>';
        // print_r($exparr);
        // echo '</pre>';
        // echo '<br>-----<br>';
        // echo $exp->expense_date;
   
      
        // dd($exp);
        // die();

        /* clock*/
        $data = table::settings()->where('id', 1)->first();
        $cc = $data->clock_comment;
        $tz = $data->timezone;
        $tf = $data->time_format;
        $rfid = $data->rfid;
        /* clock end*/

        /* year data */
        $exp = DB::table('expense')
        ->select(
            DB::raw("YEAR(expense_date)")
            )
          
           ->groupByRaw('YEAR(expense_date)')
           ->orderBy('YEAR(expense_date)','desc')
            ->get();
            
            $year_data = [];
            $i = 0;
            
     foreach($exp as $k){
         ++$i;
         $key = 'y'.$i;
         array_push( $year_data ,$k->{'YEAR(expense_date)'} );
      } /* get expense year */
// dd( $year_data);die();



        return view('admin.dashboard', compact('tf', 'emp_typeR', 'emp_typeT', 'emp_allActive', 'emp_leaves_pending', 'emp_leaves_approve', 'emp_leaves_all', 'emp_approved_leave', 'emp_all_type','a', 'is_online_now', 'is_offline_now','is_online_arr','is_timein_arr','is_timeout_arr','is_timeout_now','is_timein_now','emp_all','exp','pay','exparr','cc', 'tz', 'tf', 'rfid','year_data'));
    }

    public function graphAjaxData($yr){
        // return response()->json($yr, 200);
  
        // $grouped = DB::table('expense')
        // ->select(
        //     DB::raw('count(id) as data'), 
        //     DB::raw("MONTH(expense_date)"),
        //     DB::raw("YEAR(expense_date)"),  
        //     DB::raw(' SUM(total_expense) AS type_a')
        //     )
        //    ->groupByRaw('MONTH(expense_date)')
        //    ->groupByRaw('YEAR(expense_date)')
        // ->get();

        $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        // $grouped = DB::table('expense')
        // ->select(
        //     DB::raw('count(id) as data'), 
        //     DB::raw("DATE_FORMAT(expense_date, '%m-%Y') new_date"),  
        //     DB::raw('YEAR(expense_date) year, MONTH(expense_date) month')
        //     )
        // ->groupBy('year','month')
        // ->get();

        
        $grouped = DB::table('expense')
        ->select(
            DB::raw('count(id) as data'),
            DB::raw('MONTH(expense_date)'),
            DB::raw("YEAR(expense_date)"),  
            DB::raw('SUM(total_expense) AS total')
            )
          
           ->groupByRaw('MONTH(expense_date)')
           ->groupByRaw('YEAR(expense_date)')
           ->where( DB::raw('YEAR(expense_date)'),$yr)
           ->orderBy('MONTH(expense_date)','asc')
            ->get();
            $tot = [];
            $arr = [];
     foreach($grouped as $k){
       
        $tot[$k->{'MONTH(expense_date)'}] = $k->total;
     }
    
        //    echo '<br>-----<br>';
        //      echo '<pre>';
        //              print_r($grouped);
        //      echo '</pre>';
        //    echo '<pre>';
        //         print_r($tot);
        //    echo '</pre>';
           $arrtot = [];
       for($i = 0;$i<=11;$i++){
            if(isset($tot[$i+1])){
            $arrtot[$i] = $tot[$i+1];
            }else{
                $arrtot[$i] = 0;

            }
       }
    //    echo '<pre>';
    //    print_r($arrtot);
    //     echo '</pre>';
  

        //    echo $grouped->total.'<br>';
        //    echo $grouped->year.'<br>';
        //    echo $grouped->month.'<br>';
        //    echo '<br>-----<br>';
        // die();

        // $grouped = DB::table('expense')
        //         ->selectRaw('
        //             SUM(total_expense) AS type_a
        //         ')
        //         ->groupByRaw('MONTH(expense_date)')
        //         ->get();
                // dd($grouped);die();

        return response()->json($arrtot, 200);

    }
}
