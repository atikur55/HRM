<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;
use App\User;



class ExpenseController extends Controller
{
    public function index() 
	{
		
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

		// $emp_typeR = table::people()
		// ->where('employmenttype', 'Regular')
		// ->where('employmentstatus', 'Active')
		// ->count();

		// $emp_typeT = table::people()
		// ->where('employmenttype', 'Trainee')
		// ->where('employmentstatus', 'Active')
		// ->count();

		// $emp_genderM = table::people()
		// ->where('gender', 'Male')
		// ->count();

		// $emp_genderR = table::people()
		// ->where('gender', 'Female')
		// ->count();

		// $emp_allActive = table::people()
		// ->where('employmentstatus', 'Active')
		// ->count();

		// $emp_allArchive = table::people()
		// ->where('employmentstatus', 'Archive')
		// ->count();

		// $data = table::people()
        // ->join('tbl_company_data', 'tbl_people.id', '=', 'tbl_company_data.reference')
		// ->get();

		// $emp_file = table::people()->count();
		
		// if($emp_allArchive != null OR $emp_allActive != null OR $emp_allArchive >= 1 OR $emp_allActive >= 1)
		// {
		// 	$number1 = $emp_allArchive / $emp_allActive * 100;
		// } else {
		// 	$number1 = null;
		// }
		// $cat = DB::table('expense_category')->get();
		$user = User::where('id',Auth::id())->first();
		if ($user->acc_type == 2) 
		{
			$cat = DB::table('expense_category')->get();
		} 
		else 
		{
			$cat = DB::table('expense_category')->where('created_by',$user->id)->get();
		}
		$data = DB::table('expense')
		->join('expense_category','expense.category_id','=','expense_category.id')
		->select('expense.*','expense_category.expense_category_name')
		->get();
	

		return view('admin.expense.expense', compact('cat','data'));
		// return view('admin.expense.expense', compact('cat','data', 'emp_typeR', 'emp_typeT', 'emp_genderM', 'emp_genderR', 'emp_allActive', 'emp_file', 'emp_allArchive'));
	}

	public function expense($id){
		
		if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }
	
			if(isset($id))
			{
				$expense = DB::table('expense')->where('reference',$id)->get();

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
					return view('admin.expense.expense', compact('datas','eid','expense','empAtten', 'employee', 'tf','data'));
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
					return view('admin.expense.expense', compact('datas','eid','expense','empAtten', 'employee', 'tf','data'));
				
				} elseif ($id !== null AND $datefrom !== null AND $dateto !== null) {
					$data = table::attendance()->where('reference', $id)->whereBetween('date', [$datefrom, $dateto])->select('idno', 'date', 'employee', 'timein', 'timeout', 'totalhours')->get();
					// echo '<br>---data--<br>';
					// echo '<pre>';
					// 	print_r($data);
					// echo '</pre>';
					// echo '<br>-----<br>';
					// echo 'id= '.$id; 
					// die();
					return view('admin.expense.expense', compact('datas','eid','expense','empAtten', 'employee', 'tf','data'));
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
					return view('admin.expense.expense', compact('datas','eid','expense','empAtten', 'employee', 'tf','data'));
					// return response()->json($data);
				} 
				
				
				/*Filter Data end */
				
				return view('admin.expense.expense', compact('datas','eid','expense','empAtten', 'employee', 'tf'));

		}else{

			return redirect()->back();
		
		}
	
 }

	public function expensestore(Request $request){

		// dd($request);
		// echo $id;
		
		$category_id = $request['expensecategory'];
		$expense_date = $request['expensedate'];
		$list = $request['list'];	
		$qty = $request['amount'];	
		$price = $request['price'];	
		$total = $request['total'];	
		$total_expense = $request['net'];
		$comment = $request['comment'];
		// echo '<br>--list--</br>';
		// echo '<pre>';
		// print_r($list);
		// echo '</pre>';
		// echo '<br>----</br>';

		// echo '<br>--qty--</br>';
		// echo '<pre>';
		// print_r($qty);
		// echo '</pre>';
		// echo '<br>----</br>';

		// echo '<br>--price--</br>';
		// echo '<pre>';
		// print_r($price);
		// echo '</pre>';
		// echo '<br>----</br>';

		// echo '<br>--total--</br>';
		// echo '<pre>';
		// print_r($total);
		// echo '</pre>';
		// echo '<br>----</br>';

		$arr = array();
		if(isset($list))
			for($i=0;$i<count($list);$i++){
				$arr[$i] = $list[$i].'_'.$qty[$i].'_'.$price[$i].'_'.$total[$i];
			}
		else{
			$arr[0] = 'Nan_00_00_00'; 
		}
		
		// echo '<br>--total--</br>';
		// echo '<pre>';
		// print_r($arr);
		// echo '</pre>';
		// echo '<br>----</br>';


		// die();
		$data = array();
		$list_qty_price_total = implode( ',', $arr );
	
		$data['category_id'] = $category_id;
		$data['expense_date'] = $expense_date;
		$data['list_qty_price_total'] =	$list_qty_price_total  ;
		$data['total_expense'] = $total_expense;
		$data['expense_date'] = $expense_date;
		$data['comment'] = $comment;
	

		if(DB::table('expense')->insert($data))
			return redirect()->back()->with('success','expense added successfully');
		else
			return redirect()->back()->with('success','Failed. Something went wrong.');

	}
	public function expenseedit($id){

		
		// echo $id;
		// die();
		$cat = DB::table('expense_category')->get();

		$eid = DB::table('expense')
			 ->join('expense_category', 'expense.category_id', '=', 'expense_category.id')
			 ->where('expense.id',$id)
			 ->select('expense.*','expense_category.expense_category_name')
			 ->first();
		// dd($eid);die();
			
		return view('admin.expense.expenseedit',compact('eid','cat'));
	

	}

	public function expenseupdate(Request $request,$id){

		dd($request);
		echo $id;
		die();	
		$data = array();

		$data['reference'] = $request->id;
		$data['salary'] = $request->salary;
		$data['deduction'] = $request->deduction;
		$data['bonus'] = $request->bonus;
		$data['fromdate'] = $request->fromdate;
		$data['todate'] = $request->todate;
		$data['attendance_count'] = $request->attendance_count;
		$data['comment'] = $request->expensecomment;

		// echo 'status '.$request->status;die();

		if($request->approve_key==2)
			$data['approve_key'] = $request->approve_key;
		elseif($request->approve_key==null)
			$data['approve_key'] =1;

		$data['expense_updated_at'] = now();
	

		if(DB::table('expense')->where('id',$id)->update($data))
			return redirect()->back();
		else
			echo 'failed';

	}

	public function listexpense(){
		$cat = DB::table('expense_category')->get();
		$data = DB::table('expense')
		->join('expense_category','expense.category_id','=','expense_category.id')
		->select('expense.*','expense_category.expense_category_name')
		->get();
	

		return view('admin.expense.listexpense', compact('cat','data'));
	   
	}

	public function expense_category(){
		// $data = DB::table('expense_category')->get();
		$user = User::where('id',Auth::id())->first();
		if ($user->acc_type == 2) 
		{
			$data = DB::table('expense_category')->get();
		} 
		else 
		{
			$data = DB::table('expense_category')->where('created_by',$user->id)->get();
		}
		return view('admin.expense.expense_category',compact('data'));
	}
	 public function expense_category_store(Request $request)
	{
		$data =array();
		$data['expense_category_name'] = $request->expense_category_name;
		$data['created_by']= $request->created_by;
		if(DB::table('expense_category')->insert($data))
			return redirect()->back()->with('success','Category Added Successfully');
		else return redirect()->back()->with('error','Failed to create');
	}
	public function expense_category_delete($id){
		// echo $id;die();
		if(DB::table('expense_category')->where('id',$id)->delete()){
			if(DB::table('expense')->where('category_id',$id)->update(['category_id'=>7]))
				return redirect()->back()->with('success','Category Deleted Successfully');
			else return redirect()->back()->with('error','Failed to update from expense list');
		}
		
		else return redirect()->back()->with('error','Failed to Delete');
	}

	public function expensedelete($id){
		// echo $id;die();
		if(DB::table('expense')->where('id',$id)->delete()){
				return redirect()->back()->with('success','Expense Deleted Successfully');
		
		}else return redirect()->back()->with('error','Failed to Delete');
	}

}
