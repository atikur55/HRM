<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class EmpReg extends Controller
{
    public function add(Request $request)
    {
		// return Validator::make($data, [
			//         'name' => ['required', 'string', 'max:255'],
			//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			//         'password' => ['required', 'string', 'min:8', 'confirmed'],
			//     ]);
		
		$v = $request->validate([
			
			'lastname' => 'required|alpha_dash_space|max:155',
			'firstname' => 'required|alpha_dash_space|max:155',
			// 'mi' => 'required|alpha_dash_space|max:155',
			// 'age' => 'required|digits_between:0,199|max:3',
			// 'gender' => 'required|alpha|max:155',
			'emailaddress' => 'required|email|max:155|unique:users',
			// 'civilstatus' => 'required|alpha|max:155',
			// 'height' => 'required|digits_between:0,299|max:3',
			// 'weight' => 'required|digits_between:0,999|max:3',
			// 'mobileno' => 'required|max:155',
			// 'birthday' => 'required|date|max:155',
			// 'nationalid' => 'required|max:155',
			// 'birthplace' => 'required|max:255',
			// 'homeaddress' => 'required|max:255',
			// 'company' => 'required|alpha_dash_space|max:100',
			// 'department' => 'required|alpha_dash_space|max:100',
			// 'jobposition' => 'required|alpha_dash_space|max:100',
			// 'companyemail' => 'required|email|max:155',
			// 'leaveprivilege' => 'required|max:155',
			'idno' => 'required|max:155',
			// 'employmenttype' => 'required|alpha_dash_space|max:155',
			'employmentstatus' => 'required|alpha_dash_space|max:155',
			// 'startdate' => 'required|date|max:155',
			// 'dateregularized' => 'required|date|max:155'
		]);
	  
		$lastname = mb_strtoupper($request->lastname);
		$firstname = mb_strtoupper($request->firstname);
		$mi = mb_strtoupper($request->mi);
		$age = $request->age;
		$gender = mb_strtoupper($request->gender);
		$emailaddress = mb_strtolower($request->emailaddress);
		$civilstatus = mb_strtoupper($request->civilstatus);
		$height = $request->height;
		$weight = $request->weight;
		$mobileno = $request->mobileno;
		$birthday = date("Y-m-d", strtotime($request->birthday));
		$nationalid = mb_strtoupper($request->nationalid);
		$birthplace = mb_strtoupper($request->birthplace);
		$homeaddress = mb_strtoupper($request->homeaddress);
		$company = mb_strtoupper($request->company);
		$department = mb_strtoupper($request->department);
		$jobposition = mb_strtoupper($request->jobposition);
		$companyemail = mb_strtolower($request->companyemail);
		$leaveprivilege = $request->leaveprivilege;
		$idno = mb_strtoupper($request->idno);
		$employmenttype = $request->employmenttype;
		$employmentstatus = $request->employmentstatus;
		$startdate = date("Y-m-d", strtotime($request->startdate));
		$dateregularized = date("Y-m-d", strtotime($request->dateregularized));

		$is_idno_taken = table::companydata()->where('idno', $idno)->exists();

		if ($is_idno_taken == 1) 
		{
			return redirect('employees-new')->with('error', trans("Whoops! the ID Number is already taken."));
		}

		$file = $request->file('image');

		if($file != null) 
		{
			$name = $request->file('image')->getClientOriginalName();
			$destinationPath = public_path() . '/assets/faces/';
			$file->move($destinationPath, $name);
		} else {
			$name = '';
		}
		
    	table::people()->insert([
    		[
				'lastname' => $lastname,
				'firstname' => $firstname,
				'mi' => $mi,
				'age' => $age,
				'gender' => $gender,
				'emailaddress' => $emailaddress,
				'civilstatus' => $civilstatus,
				'height' => $height,
				'weight' => $weight,
				'mobileno' => $mobileno,
				'birthday' => $birthday,
				'birthplace' => $birthplace,
				'nationalid' => $nationalid,
				'homeaddress' => $homeaddress,
				'employmenttype' => $employmenttype,
				'employmentstatus' => $employmentstatus,
				'avatar' => $name,
            ],
    	]);

		$refId = DB::getPdo()->lastInsertId();
		
    	table::companydata()->insert([
    		[
    			'reference' => $refId,
				'company' => $company,
				'department' => $department,
				'jobposition' => $jobposition,
				'companyemail' => $companyemail,
				'leaveprivilege' => $leaveprivilege,
				'idno' => $idno,
				'startdate' => $startdate,
				'dateregularized' => $dateregularized,
            ],
    	]);

    	return redirect('employees')->with('success', trans("New employee has been added!"));
	}
	
	public function register(Request $request)
    {
       
        // dd($request);die();
        // echo '<br>----<br>';
        // echo '<pre>';
        // print_r($request);
        // echo '</pre>';
        // echo '<br>----<br>';

        // $n = explode('-',$request->name);
        // $name = $n[0];
        // $ref = $n[2];
        // echo $name.' '.$ref;
        // die();

        $v = $request->validate([
            //'ref' => 'required|max:100',
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'role_id' => 'required|digits_between:1,99|max:2',
            // 'acc_type' => 'required|digits_between:1,99|max:2',
            'password' => 'required|min:8|max:100',
            'password_confirmation' => 'required|min:8|max:100',
            'status' => 'required|boolean|max:1',
        ]);

        // $ref = $ref;
        $name = $request->name;
    	$email = $request->email;
		$role_id = $request->role_id;
		if($role_id == 2){
			$acc_type = 1;
		}elseif($role_id == 3){
			$acc_type = 3;
		}
	
		$password = $request->password;
		$password_confirmation = $request->password_confirmation;
	
	

        if ($password != $password_confirmation) 
        {
            return redirect('emp/reg')->with('error', trans("Whoops! Password confirmation does not match!"));
        }

        $is_user_exist = table::users()->where('email', $email)->count();

        if($is_user_exist >= 1) 
        {
            return redirect('emp/reg')->with('error', trans("Whoops! this user already exist"));
        }

        // $idno = table::companydata()->where('reference', $ref)->value('idno');

	
		
		if($role_id == 2){
			table::people()->insert([
				[
					'lastname' => $name,
					'emailaddress' => $email,
					
				],
			]);
			

			$refId = DB::getPdo()->lastInsertId();
	
			$status = $request->status;
			$refId = $refId;
			$rand = rand(1000,9999).$refId;
		}elseif($role_id == 3){
			$status = 1;
			$refId = null;
			$rand = null;
		}
		
		if( table::users()->insert([
    		[
				
				'name' => $name,
				'email' => $email,
				'role_id' => $role_id,
				'acc_type' => $acc_type,
				'password' => Hash::make($password),
				'status' => $status,
				'reference' => $refId,
				'idno' => $rand
            ],
		]))
		if($request->role_id == 3){
			return redirect('login')->with('alert-success', trans("Success! Log in please."));
		}elseif($request->role_id == 2){
			
			if($refId){
				DB::table('tbl_company_data')->insert([
					'reference'=>$refId,
					'idno'=>$rand
				]);
			}


			return redirect('login')->with('alert-success', trans("you have been added. Please wait for verification"));
		}
	


		else{
			return redirect('login')->with('error', trans("Something wrong"));
		}
    }
}
