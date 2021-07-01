<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use DB;
use PDF;
use App\File;
use Auth;
use App\Payroll;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;



class ApiController extends Controller
{
  public function allemp($id){
        $single_payroll = DB::table('users')->where('id',$id)->first();
        $employee_ref = $single_payroll->reference;
        $get_employee_payroll = DB::table('payroll')->where('reference', $employee_ref)->get();
    //   $agents = User::where('role_id',1)->orWhere('role_id',2)->select("id","role_id","name")->get();
    // $agents = User::where('id',$id)->get();
      return response()->json($get_employee_payroll );
  }
  //shaun fileview API
  public function empfileview($id){

    $single_payroll = DB::table('users')->where('id',$id)->first();

//   dd();die();
    $employee_ref = $single_payroll->reference;

    $get_employee_payroll = DB::table('payroll')->where('reference', $employee_ref)->get();

    return response()->json( $get_employee_payroll );

  }

  public function fileupload(Request $request){

// echo $request->file;die();

    $request->validate([
        'file' => 'required|mimes:pdf,xlx,jpeg,bmp,png,csv,txt,doc,docx,pptx,ppt,xlsx,mp4|max:10000',
    ]);
      // dd($request->all());die();
    $fileName = time().'.'.$request->file->extension();

    $path=$request->file->move(public_path('uploads'), $fileName);
    // echo $fileName;die();
    // print_r($path);
    //
    // dump($request);die();

    $data = File::insert([
        'emp_name'=>$request->emp_name,
        'file'=>$fileName,
        'file_title' => $request->file_title,
        'description' => $request->description,
        'created_at' => Carbon::now(),
    ]);
    // return response()->json($path,200);
    if($data)
      {
          $d=array();
          $d=['status'=>'inserted Successfully '];
          return response()->json($d, 200);
      }
      else
      {
          $d=array();
          $d=['status'=>' Failed'];
          return response()->json($d, 201);
      }
  }

  public function filedownload($file){
      return Response()->download('uploads/'.$file);
  }
  public function payroll_download($payroll_id)
	{
	  $payroll_info = DB::table('payroll')->where('id',$payroll_id)->first();
      $payroll_pdf = PDF::loadView('admin.download.payroll',compact('payroll_info'));
      $dynamic_name = "payroll-".$payroll_info->id.'_'.Carbon::now()->format('d-m-Y').".pdf";
      return $payroll_pdf->download($dynamic_name);
	}


  public function fileview(){
    $all= File::select('id','emp_name','file_title','description','file')->get();
    return response()->json($all,200);
  }

  public function payrollview(){
    // $all= table::payroll()->select('id','salary')->get();
    // return response()->json($all,200);
    $all=DB::table('payroll')
    ->join('users','payroll.reference','=','users.reference')
		->select('payroll.*','users.idno','users.name')
		->get();
    return response()->json($all,200);
  }
  
  public function employeeData2(){
      
      $d = DB::table('users')->where('status',1)->where('role_id',1)->orWhere('role_id',2)->get();
       return response()->json($d,200);
  }
    public function index(){

    $datenow = date('Y-m-d');
    // $is_online = table::attendance()->where('date', $datenow)->pluck('idno')->pluck('status_timein')->pluck('status_timeout');

     /* My code */
     $is_timein = table::attendance()->where('date', $datenow)->pluck('status_timein');


     $is_timein_arr = json_decode(json_encode($is_timein), true);


     $is_timein_now = count($is_timein);

     $is_timeot = table::attendance()->where('date', $datenow)->pluck('status_timeout');


     $is_timeot_arr = json_decode(json_encode($is_timeot), true);


     $is_timeot_now = count($is_timeot);




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
    ->select('tbl_people.id','tbl_people.firstname','tbl_people.lastname','tbl_people.avatar','tbl_people_attendance.timein','tbl_people_attendance.timeout','tbl_company_data.department')
    ->get();

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

        if ($emp_all_type) {
            return response()->json($emp_all_type , 200);
           } else {
            return response()->json([
                      'type' => 'activity_items',
                      'message' => 'Fail'
                  ], 400);
           }
          }

    public function attendanceCount(){
        $datenow = date('Y-m-d');


        $is_online = table::attendance()->where('date', $datenow)->pluck('idno');
         $off = table::attendance()->where('date', $datenow)->where('timeout','<>',null)->pluck('idno');
          $count_offline = count($off);


        $is_online_arr = json_decode(json_encode($is_online), true);

        $is_online_now = count($is_online);

        $emp_ids = table::companydata()->pluck('idno');
        $emp_ids_arr = json_decode(json_encode($emp_ids), true);
        $is_offline_now = count(array_diff($emp_ids_arr, $is_online_arr));
        //$total = $is_online_now+$is_offline_now;
          $tf = table::settings()->value("time_format");

    $emp_all_type = table::people()
    ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
    ->join('tbl_people_attendance', 'tbl_people.id', '=', 'tbl_people_attendance.reference')
    ->where('tbl_people.employmentstatus', 'Active')
    ->where('tbl_people_attendance.date', $datenow)
    ->orderBy('tbl_company_data.startdate', 'desc')
    //->take(8)
    ->get();

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

    $online = $is_online_now-$count_offline;
    $offline = $is_offline_now+$count_offline;
    $total = $online+$offline;

    $time_out = $count_offline;

        $arr  = array(
            'online'=>$online,
            'offline'=>$offline,
            'total'=>$total,
            'timein'=>$is_online_now,
            'ntimein' =>$is_offline_now,

            'emp_typeR'=> $emp_typeR,
            'emp_typeT'=>$emp_typeT,
            'emp_leaves_approve'=>$emp_leaves_approve,
            'emp_leaves_all'=>$emp_leaves_all,
            'time_out'=>$time_out
            );



            if ($arr) {
                return response()->json($arr , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
        }

            public function employeeData(){

    $datenow = date('Y-m-d');
    // $is_online = table::attendance()->where('date', $datenow)->pluck('idno')->pluck('status_timein')->pluck('status_timeout');

     /* My code */
     $is_timein = table::attendance()->where('date', $datenow)->pluck('status_timein');


     $is_timein_arr = json_decode(json_encode($is_timein), true);


     $is_timein_now = count($is_timein);

     $is_timeot = table::attendance()->where('date', $datenow)->pluck('status_timeout');


     $is_timeot_arr = json_decode(json_encode($is_timeot), true);


     $is_timeot_now = count($is_timeot);




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
    ->orderBy('tbl_company_data.startdate', 'desc')
    //->take(8)
    ->select('tbl_people.id','tbl_people.firstname','tbl_people.lastname','tbl_people.employmentstatus','tbl_company_data.department','tbl_company_data.idno','tbl_people.avatar','tbl_people.salary')
    // ->distinct()
    ->get();

    // $c = table::people()
    // ->get();
    // echo 'test';
    // dd($c);

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

        if ($emp_all_type) {
            return response()->json($emp_all_type , 200);
           } else {
            return response()->json([
                      'type' => 'activity_items',
                      'message' => 'Fail'
                  ], 400);
           }
          }

    public function empSingle($id){
        if($id){
            $data = table::people()
                ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
               ->where('tbl_people.id',$id)
            ->first();

            // dd($data);die();

            $i = DB::table('tbl_people_attendance')
            ->where('reference',$id)
            ->sum('totalhours');

            // array_push($data,$i);
        $data->sum = $i;

            // var_dump($data);
            // echo '<br>';
            // var_dump($i);
            // echo '<br>';

            // echo $i;
            //  echo '<br>';

            // echo  $data->sum ;
            //   die();


              if ($data) {
                return response()->json($data , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
        }else{
            echo 'no data found';
        }
    }

        public function attendance()
    {


        $data = table::attendance()
         ->join('users', 'tbl_people_attendance.reference', '=', 'users.reference')
         ->join('tbl_people', 'tbl_people_attendance.reference', '=', 'tbl_people.id')
         ->select('tbl_people_attendance.*','users.idno','users.name','tbl_people.avatar')

        ->orderBy('date', 'desc')->get();

        // $ss = table::settings()->select('clock_comment', 'time_format')->first();
        // $employees = table::people()->get();
        // $tf = table::settings()->value("time_format");
        // $cc = table::settings()->value("clock_comment");

            if ($data) {
                return response()->json($data , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
    }

    public function schedule(){

        $employee = table::people()->get();
        $schedules = table::schedules()->get();
        $tf = table::settings()->value("time_format");
           if ($schedules) {
                return response()->json($schedules , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
    }
    public function payroll(){
        			$payroll = DB::table('payroll')
		->join('users','payroll.reference','=','users.reference')
		->select('payroll.*','users.idno','users.name')
		->get();
	        	 if ($payroll) {
                return response()->json($payroll , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
    }


    public function leave()
    {

        $employee = table::people()->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')->get();
        $leaves = table::leaves()->join('tbl_people','tbl_people_leaves.reference','=','tbl_people.id')->select('tbl_people_leaves.*','tbl_people.avatar','tbl_people.firstname','tbl_people.lastname')->orderBy('tbl_people_leaves.id', 'desc')->get();

        // dd($leaves);die();
        $leave_types = table::leavetypes()->get();

       	 if ($leaves) {
                return response()->json($leaves , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
    }

    public function ExpenseGraphYear(){
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
         array_push( $year_data ,(Object)$k->{'YEAR(expense_date)'} );


    //   $year_data[$key] =array( 'year_name'=>$k->{'YEAR(expense_date)'} ) ;

     }
    // $year_data = $exp;

        //   $arr  = array(
        //     'y0'=>$online,
        //     'y1'=>$offline,
        //     'y2'=>$total,
        //     'y3'=>$is_online_now,
        //     'y4' =>$is_offline_now,

        //     'y5'=> $emp_typeR,
        //     'y6'=>$emp_typeT,
        //     'y7'=>$emp_leaves_approve,
        //     'y8'=>$emp_leaves_all,
        //     'y9'=>$time_out
        //     );

           	 if ($year_data) {
                return response()->json($year_data, 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }
    }


    public function expenseGraph($yr=2021){

        $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];


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
           $arrtot = [];

       for($i = 0;$i<=11;$i++){
             $key = 'm'.$i;
            if(isset($tot[$i+1])){
            $arrtot[$key] = $tot[$i+1];
            }else{
                $arrtot[$key] = 0;

            }
       }




        if ($arrtot) {
                return response()->json([$arrtot] , 200);
               } else {
                return response()->json([
                          'type' => 'activity_items',
                          'message' => 'Fail'
                      ], 400);
               }

    }

    public function contact($client_id){
        // echo auth()->user()->id;die();
        $data = DB::table('client_contacts')->where('client_id',$client_id)->orderBy('id','DESC')->get();

        if ($data) {
            return response()->json($data , 200);
           } else {
            return response()->json([
                      'type' => 'activity_items',
                      'message' => 'Fail'
                  ], 400);
           }
    }

    public function storeContact(Request $request){
        $data = [];
        // $data['client_name'] = $request->client_name;
        $data['client_message_subject'] = $request->client_message_subject;
        // $data['client_email'] = $request->client_email;
        $data['client_message'] = $request->client_message;
        $data['client_id'] = $request->client_id;
        $data['created_at'] = date('Y-m-d H:s:i');


       $res = DB::table('client_contacts')->insert($data);

       if ($res) {
        return response()->json([
            'message' => 'Message Sent Successfully'
        ] , 200);
       } else {
        return response()->json([
                  'type' => 'activity_items',
                  'message' => 'Fail'
              ], 400);
       }

    }



      public function clientMessage(){
        $clientMessageData = DB::table('client_contacts')
                        ->join('users','users.id','=','client_contacts.client_id')
                        ->select('client_contacts.*','users.*')
                        ->get();
       if($clientMessageData ) {
        return response()->json($clientMessageData
         , 200);
       } else {
        return response()->json([
                  'type' => 'activity_items',
                  'message' => 'Fail'
              ], 400);
       }
    }





    public function project($client_id){
        // echo auth()->user()->id;die();
        $data = DB::table('registered_client_projects')->where('client_id',$client_id)->get();

        if ($data) {
            return response()->json($data , 200);
           } else {
            return response()->json([
                      'type' => 'activity_items',
                      'message' => 'Fail'
                  ], 400);
           }
    }


    public function clockAdd($idno,$type)
    {
        $data = [];
        $clockstatus = '';
        $dtype = '';
        $dtime = '';
        $ddate = '';
        $dlastname = '';
        $dfirstname = '';
        $dmi = '';
        $demployee = '';


        $idno = strtoupper($idno);
        $type = $type;
        $date = date('Y-m-d');
        $time = date('h:i:s A');
        // $comment = strtoupper($request->clockin_comment);
        $comment = '';
        // $ip = $request->ip();
        $ip = '';

        // clock-in comment feature
        $clock_comment = table::settings()->value('clock_comment');
        $tf = table::settings()->value('time_format');
        $time_val = ($tf == 1) ? $time : date("H:i:s", strtotime($time)) ;

        // if ($clock_comment == "on")
        // {
        //     if ($comment == NULL)
        //     {
        //         return response()->json([
        //             "clockstatus" => trans("Please provide your comment!")
        //         ]);
        //     }
        // }

        // ip resriction
        // $iprestriction = table::settings()->value('iprestriction');
        // if ($iprestriction != NULL)
        // {
        //     $ips = explode(",", $iprestriction);

        //     if(in_array($ip, $ips) == false)
        //     {
        //         $msge = trans("Whoops! You are not allowed to Clock In or Out from your IP address")." ".$ip;
        //         return response()->json([
        //             "clockstatus" => $msge,
        //         ]);
        //     }
        // }

        $employee_id = DB::table('users')->where('idno', $idno)->value('reference');

        if($employee_id == null) {
            // $data = [
            //     "clockstatus" => trans("You enter an invalid ID.")
            // ];
            $clockstatus = trans("You enter an invalid ID.");
            // return response()->json();

            $dtype ='';
            $dtime = '';
            $ddate = '';
            $dlastname ='';
            $dfirstname = '';
            $dmi ='';
            $demployee = '';

            $data = [
                "type" => $dtype,
                "time" => $dtime,
                "date" => $ddate,
                "lastname" => $dlastname,
                "firstname" => $dfirstname,
                "mi" => $dmi,
                "employee" =>$demployee,
                "clockstatus" =>$clockstatus,
            ];

            return response()->json(
              (object)$data
            );
        }

        $emp = table::people()->where('id', $employee_id)->first();
        $lastname = '';
        $firstname = '';
        $mi = '';
        $employee = '';
        if($emp){
            $lastname = $emp->lastname;
            $firstname = $emp->firstname;
            $mi = $emp->mi;
            $employee = mb_strtoupper($lastname.', '.$firstname.' '.$mi);
        }


        if ($type == 'timein')
        {
            $has = table::attendance()->where([['idno', $idno],['date', $date]])->exists();

            if ($has == 1)
            {
                $hti = table::attendance()->where([['idno', $idno],['date', $date]])->value('timein');
                $hti = date('h:i A', strtotime($hti));
                $hti_24 = ($tf == 1) ? $hti : date("H:i", strtotime($hti)) ;

                // $data = [
                //     "employee" => $employee,
                //     "clockstatus" => trans("You already Time In today at")." ".$hti_24,
                // ];
                // return response()->json([(object)$data]);
                $clockstatus = trans("You already Time In today at")." ".$hti_24;
                $demployee = $employee;

                $dtype ='timein';
                $dtime = '';
                $ddate = '';
                $dlastname ='';
                $dfirstname = '';
                $dmi ='';

                $data = [
                    "type" => $dtype,
                    "time" => $dtime,
                    "date" => $ddate,
                    "lastname" => $dlastname,
                    "firstname" => $dfirstname,
                    "mi" => $dmi,
                    "employee" =>$demployee,
                    "clockstatus" =>$clockstatus,
                ];

                return response()->json(
                  (object)$data
                );

            } else {
                $last_in_notimeot = table::attendance()->where([['idno', $idno],['timeout', NULL]])->count();

                if($last_in_notimeot >= 1)
                {
                    // $data = [
                    //     "clockstatus" => trans("Please Clock Out from your last Clock In.")
                    // ];
                    // return response()->json([(object)$data
                    // ]);
                    $clockstatus =  trans("Please Clock Out from your last Clock In.");

                    $dtype = 'timein';
                    $dtime = '';
                    $ddate = '';
                    $dlastname = '';
                    $dfirstname = '';
                    $dmi = '';
                    $demployee = '';


                    $data = [
                        "type" => $dtype,
                        "time" => $dtime,
                        "date" => $ddate,
                        "lastname" => $dlastname,
                        "firstname" => $dfirstname,
                        "mi" => $dmi,
                        "employee" =>$demployee,
                        "clockstatus" =>$clockstatus,
                    ];

                    return response()->json(
                      (object)$data
                    );

                } else {

                    $sched_in_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('intime');

                    if($sched_in_time == NULL)
                    {
                        $status_in = "Ok";
                    } else {
                        $sched_clock_in_time_24h = date("H.i", strtotime($sched_in_time));
                        $time_in_24h = date("H.i", strtotime($time));

                        if ($time_in_24h <= $sched_clock_in_time_24h)
                        {
                            $status_in = 'In Time';
                        } else {
                            $status_in = 'Late In';
                        }
                    }

                    if($clock_comment == "on" && $comment != NULL)
                    {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                                'comment' => $comment,
                            ],
                        ]);
                    } else {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                            ],
                        ]);
                    }

                //     $data = [
                //         "type" => $type,
                //         "time" => $time_val,
                //         "date" => $date,
                //         "lastname" => $lastname,
                //         "firstname" => $firstname,
                //         "mi" => $mi,
                //     ];

                //     return response()->json([
                //    (object)$data
                //     ]);
                    $dtype = $type;
                    $dtime = $time_val;
                    $ddate = $date;
                    $dlastname = $lastname;
                    $dfirstname = $firstname;
                    $dmi = $mi;

                    $demployee = '';
                    $clockstatus = 'Time in Successful';

                    $data = [
                        "type" => $dtype,
                        "time" => $dtime,
                        "date" => $ddate,
                        "lastname" => $dlastname,
                        "firstname" => $dfirstname,
                        "mi" => $dmi,
                        "employee" =>$demployee,
                        "clockstatus" =>$clockstatus,
                    ];

                    return response()->json(
                    (object)$data
                    );
                }
            }
        }

        if ($type == 'timeot')
        {
            $timeIN = table::attendance()->where([['idno', $idno], ['timeout', NULL]])->value('timein');
            $clockInDate = table::attendance()->where([['idno', $idno],['timeout', NULL]])->value('date');
            $hasout = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');
            $timeot = date("Y-m-d h:i:s A", strtotime($date." ".$time));

            if($timeIN == NULL)
            {
                // $data = [
                //     "clockstatus" => trans("Please Clock In before Clocking Out.")];
                // return response()->json([(object)$data
                // ]);
                $clockstatus = trans("Please Clock In before Clocking Out.");

                $dtype = 'timeot';
                $dtime = '';
                $ddate = '';
                $dlastname = '';
                $dfirstname ='';
                $dmi = '';
                $demployee = '';

                $data = [
                    "type" => $dtype,
                    "time" => $dtime,
                    "date" => $ddate,
                    "lastname" => $dlastname,
                    "firstname" => $dfirstname,
                    "mi" => $dmi,
                    "employee" =>$demployee,
                    "clockstatus" =>$clockstatus,
                ];

                return response()->json(
                  (object)$data
                );
            }

            if ($hasout != NULL)
            {
                $hto = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');
                $hto = date('h:i A', strtotime($hto));
                $hto_24 = ($tf == 1) ? $hto : date("H:i", strtotime($hto)) ;

                // $data = [

                //     "employee" => $employee,
                //     "clockstatus" => trans("You already Time Out today at")." ".$hto_24,
                // ];
                // return response()->json([(object)$data
                // ]);
                $demployee = $employee;
                $clockstatus = trans("You already Time Out today at")." ".$hto_24;

                $dtype = 'timeot';
                $dtime = '';
                $ddate = '';
                $dlastname = '';
                $dfirstname ='';
                $dmi = '';

                $data = [
                    "type" => $dtype,
                    "time" => $dtime,
                    "date" => $ddate,
                    "lastname" => $dlastname,
                    "firstname" => $dfirstname,
                    "mi" => $dmi,
                    "employee" =>$demployee,
                    "clockstatus" =>$clockstatus,
                ];

                return response()->json(
                  (object)$data
                );

            } else {
                $sched_out_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('outime');

                if($sched_out_time == NULL)
                {
                    $status_out = "Ok";
                } else {
                    $sched_clock_out_time_24h = date("H.i", strtotime($sched_out_time));
                    $time_out_24h = date("H.i", strtotime($timeot));

                    if($time_out_24h >= $sched_clock_out_time_24h)
                    {
                        $status_out = 'On Time';
                    } else {
                        $status_out = 'Early Out';
                    }
                }

                $time1 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeIN);
                $time2 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeot);
                $th = $time1->diffInHours($time2);
                $tm = floor(($time1->diffInMinutes($time2) - (60 * $th)));
                $totalhour = $th.".".$tm;

                table::attendance()->where([['idno', $idno],['date', $clockInDate]])->update(array(
                    'timeout' => $timeot,
                    'totalhours' => $totalhour,
                    'status_timeout' => $status_out)
                );
                // $data = [
                //     "type" => $type,
                //     "time" => $time_val,
                //     "date" => $date,
                //     "lastname" => $lastname,
                //     "firstname" => $firstname,
                //     "mi" => $mi,
                // ];
                // return response()->json([
                //   (object)$data
                // ]);
                $dtype = $type;
                $dtime = $time_val;
                $ddate = $date;
                $dlastname = $lastname;
                $dfirstname = $firstname;
                $dmi = $mi;
                $clockstatus = "Time out successful";

                $data = [
                    "type" => $dtype,
                    "time" => $dtime,
                    "date" => $ddate,
                    "lastname" => $dlastname,
                    "firstname" => $dfirstname,
                    "mi" => $dmi,
                    "employee" =>$demployee,
                    "clockstatus" =>$clockstatus,
                ];

                return response()->json(
                  (object)$data
                );
            }
        }



    }






}
