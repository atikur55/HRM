<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use PDF;
use Auth;
use App\User;
use Carbon\Carbon;

class PayrollController extends Controller
{
    public function index() 
	{
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

		$emp_typeR = table::people()
		->where('employmenttype', 'Regular')
		->where('employmentstatus', 'Active')
		->count();

		$emp_typeT = table::people()
		->where('employmenttype', 'Trainee')
		->where('employmentstatus', 'Active')
		->count();

		$emp_genderM = table::people()
		->where('gender', 'Male')
		->count();

		$emp_genderR = table::people()
		->where('gender', 'Female')
		->count();

		$emp_allActive = table::people()
		->where('employmentstatus', 'Active')
		->count();

		$emp_allArchive = table::people()
		->where('employmentstatus', 'Archive')
		->count();

		// $data = table::people()
  //       ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
		// ->get();

		$emp_file = table::people()->count();
		
		if($emp_allArchive != null OR $emp_allActive != null OR $emp_allArchive >= 1 OR $emp_allActive >= 1)
		{
			$number1 = $emp_allArchive / $emp_allActive * 100;
		} else {
			$number1 = null;
		}

		$user = Auth::id();
		$user_role = User::where('id',$user)->first();
		if ($user_role->acc_type == 2) 
		{
			$data = table::people()
				->leftjoin('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
				->get();

		} 
		else 
		{
			$data = table::people()
				->where('user_id',$user)
				->leftjoin('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
				->get();
		}
		
	    return view('admin.payroll.payroll', compact('data', 'emp_typeR', 'emp_typeT', 'emp_genderM', 'emp_genderR', 'emp_allActive', 'emp_file', 'emp_allArchive'));
	}

	public function payment($id){
		// echo $id;die();
		if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }
	
			if(isset($id))
			{
				$payroll = DB::table('payroll')->where('reference',$id)->get();

				$eid = table::people()
				->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
				->where('tbl_people.id',$id)
				->first();

				$datas = table::people()
				->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
				->where('tbl_people.id',$id)
				->get();

				
					// echo '<br>---GET--<br>';
					// echo '<pre>';
					// print_r($_GET['employee']);
					// echo '</pre>';
					// echo $emp_id;
					// echo '<br>--,.GET---<br>';
				
				
				$today = date('M, d Y');
				$empAtten = table::attendance()->where('reference',$id)->get();
				$employee = table::people()->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')->where('tbl_people.employmentstatus', 'Active')->where('tbl_people.id',$id)->get();
				table::reportviews()->where('report_id', 2)->update(array('last_viewed' => $today));
				$tf = table::settings()->value("time_format");
				
				/* Filter Data */
				
				$datefrom = null;
				$dateto = null;
				
				if( isset($_GET['datefrom'])){
					$datefrom = $_GET['datefrom'];
				}
				if( isset($_GET['dateto'])){
					$dateto = $_GET['dateto'];
				}
				
				if ($datefrom == null AND $dateto == null) 
				{
					$data = table::attendance()->select('idno', 'date', 'employee', 'timein', 'timeout', 'totalhours')->where('reference',$id)->get();
					// return response()->json($data);
					return view('admin.payroll.payment', compact('datas','eid','id','payroll','empAtten', 'employee', 'tf','data'));
				}
				
				if($id !== null && $datefrom == null && $dateto == null ) 
				{
					 $data = table::attendance()->where('idno', $id)->select('idno', 'date', 'employee', 'timein', 'timeout', 'totalhours')->where('reference',$id)->get();
					// return response()->json($data);
					// echo '<br>---data--<br>';
					// echo '<pre>';
					// 	print_r($data);
					// echo '</pre>';
					// echo '<br>-----<br>';
					// echo 'id= '.$id;
					// die();
					return view('admin.payroll.payment', compact('datas','eid','id','payroll','empAtten', 'employee', 'tf','data'));
				
				} elseif ($id !== null AND $datefrom !== null AND $dateto !== null) {
					$data = table::attendance()->where('reference', $id)->whereBetween('date', [$datefrom, $dateto])->select('idno', 'date', 'employee', 'timein', 'timeout', 'totalhours')->get();
					// echo '<br>---data--<br>';
					// echo '<pre>';
					// 	print_r($data);
					// echo '</pre>';
					// echo '<br>-----<br>';
					// echo 'id= '.$id; 
					// die();
					return view('admin.payroll.payment', compact('datas','eid','id','payroll','empAtten', 'employee', 'tf','data'));
					// return response()->json($data);
				} elseif ($datefrom !== null AND $dateto !== null) {
					$data = table::attendance()->where('reference',$id)->whereBetween('date', [$datefrom, $dateto])->select('idno', 'date', 'employee', 'timein', 'timeout', 'totalhours')->get();
					// echo '<br>---data--<br>';
					// echo '<pre>';
					// 	print_r($data);
					// echo '</pre>';
					// echo '<br>-----<br>';
					// echo 'id= '.$id;
					// die();
					return view('admin.payroll.payment', compact('datas','eid','id','payroll','empAtten', 'employee', 'tf','data'));
					// return response()->json($data);
				} 
				
				
				/*Filter Data end */
				
				return view('admin.payroll.payment', compact('datas','eid','id','payroll','empAtten', 'employee', 'tf','id'));

		}else{

			return redirect()->back();
		
		}
	
 }

	public function paymentstore(Request $request,$id){

		// dd($request); die();
		// echo $id;	die();
		$client_id = table::people()->where('id',$request->id)->first();
		
		$data = array();

		$data['reference'] = $request->id;
		$data['under_client'] = $client_id->user_id;
		$data['salary'] = $request->salary;
		$data['deduction'] = $request->deduction;
		$data['bonus'] = $request->bonus;
		$data['fromdate'] = $request->fromdate;
		$data['todate'] = $request->todate;
		$data['attendance_count'] = $request->attendance_count;
		$data['comment'] = $request->comment;
		if($request->approve_key!=null)
			$data['approve_key'] = $request->approve_key;
		elseif($request->approve_key==null)
			$data['approve_key'] =1;
		$data['payment_created_at'] = now();
	

		if(DB::table('payroll')->insert($data))
			return redirect()->back()->with('success','Payroll Added Successfully');
		else
		return redirect()->back()->with('error','Something went wrong');

	}
	public function paymentedit($id,$reference){

		// dd($request);
		// echo $id;	
		$eid = DB::table('payroll')
			
			 ->join('tbl_people', 'payroll.reference', '=', 'tbl_people.id')
			 // ->join('users', 'payroll.reference', '=', 'users.reference')
			 ->join('users', 'tbl_people.idno', '=', 'users.idno')
			 ->where('payroll.reference',$reference)
			 ->where('payroll.id',$id)
			 ->select('payroll.*','users.idno','tbl_people.firstname')
			 ->first();
		// dd($eid);die();
			
		return view('admin.payroll.payment-edit',compact('eid'));
	

	}
	public function paymentdelete($id){

		// dd($request);
		// echo $id;	
		if(DB::table('payroll')
		->where('id',$id)
		->delete()) return redirect()->back()->with('success','Payroll Deleted Successfully');
		// dd($eid);die();
		else return redirect()->back()->with('error','Delete failed.');
			

	

	}

	public function paymentupdate(Request $request,$id){

		// dd($request);
		// echo $id;
		// die();	
		$data = array();

		$data['reference'] = $request->reference;
		$data['salary'] = $request->salary;
		$data['deduction'] = $request->deduction;
		$data['bonus'] = $request->bonus;
		$data['fromdate'] = $request->fromdate;
		$data['todate'] = $request->todate;
		$data['attendance_count'] = $request->attendance_count;
		$data['comment'] = $request->comment;

		// echo 'status '.$request->status;die();

		if($request->approve_key==2)
			$data['approve_key'] = $request->approve_key;
		elseif($request->approve_key==null)
			$data['approve_key'] =1;

		$data['payment_updated_at'] = now();

		// $r = DB::table('payroll')->where('id',$id)->update($data);
		// try { 
		// 	$results = DB::table('payroll')->where('id',$id)->update($data);
			 
		// 	  // Closures include ->first(), ->get(), ->pluck(), etc.
		//   } catch(\Illuminate\Database\QueryException $ex){ 
		// 	dd($ex->getMessage()); 
		// 	// Note any method of class PDOException can be called on $ex.
		//   }

		if(DB::table('payroll')->where('id',$id)->update($data))
			return redirect()->back()->with('success','Edited Successfully');
		else
		return redirect()->back()->with('success','Something went wrong');

	}

	public function listpayroll(){

		$user = User::where('id',Auth::id())->first();
		if ($user->acc_type == 2) 
		{
			$payroll = DB::table('payroll')
			->join('users','payroll.reference','=','users.reference')
			->select('payroll.*','users.idno','users.name')
			->get();
		} 
		else 
		{
			$payroll = DB::table('payroll')
			->join('users','payroll.reference','=','users.reference')
			->select('payroll.*','users.idno','users.name')
			->get();
			// $payroll = DB::table('payroll')->where('under_client',$user->id)->get();
		}
		

		// $payroll = DB::table('payroll')
		// ->join('users','payroll.reference','=','users.reference')
		// ->select('payroll.*','users.idno','users.name')
		// ->get();

//    dd($payroll);die();
	   
  		return view('admin.payroll.listpayroll',compact('payroll'));
	}
	public function payroll_download($payroll_id)
	{
	  $payroll_info = DB::table('payroll')->where('id',$payroll_id)->first();
      $payroll_pdf = PDF::loadView('admin.download.payroll',compact('payroll_info'));
      $dynamic_name = "payroll-".$payroll_info->id.'_'.Carbon::now()->format('d-m-Y').".pdf";
      return $payroll_pdf->download($dynamic_name);
	}

}
