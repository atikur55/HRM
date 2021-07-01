<?php
/*
* Workday - A time clock application for employees
* Email: official.codefactor@gmail.com
* Version: 1.1
* Author: Brian Luna
* Copyright 2020 Codefactor
*/
namespace App\Http\Controllers\personal;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;


class PersonalProfileController extends Controller
{
	public function index() 
	{
		// $id = \Auth::user()->reference;
		$id = User::where('id',Auth::id())->first();
		// echo $id;die();
		$p = table::people()->where('idno', $id->idno)->first();
// dd($profile);die();
		// $c = table::companydata()->where('reference', $id)->first();
		$c = table::companydata()->where('idno', $id->idno)->first();
		// dd($c);;die();
				// dd($company_data);die();
		$profile_photo = table::people()->select('avatar')->where('id', $id)->value('avatar');
		$leavetype = table::leavetypes()->get();
		$leavegroup = table::leavegroup()->get();

        return view('personal.personal-profile-view', compact('p', 'c', 'profile_photo', 'leavetype', 'leavegroup'));
	}
	
	public function profileAdd() 
	{
		$id=null;
		if(isset($_GET['id'])) $id = $_GET['id']; 
		$person_details = DB::table('users')->where('id', $id)->first();

		$employees = table::people()->get();
		$company = table::company()->get();
		$department = table::department()->get();
		$jobtitle = table::jobtitle()->get();
		$leavegroup = table::leavegroup()->get();


		return view('personal.personal-profile-add', compact('person_details','company', 'department', 'jobtitle', 'employees', 'leavegroup'));
	}

	public function profileStore(Request $request)
    {

		
		$v = $request->validate([
			// 'lastname' => 'required|alpha_dash_space|max:155',
			// 'firstname' => 'required|alpha_dash_space|max:155',
			// 'mi' => 'required|alpha_dash_space|max:155',
			// 'age' => 'required|digits_between:0,199|max:3',
			// 'gender' => 'required|alpha|max:155',
			'emailaddress' => 'required|email|max:155',
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
			// 'idno' => 'required|max:155',
			// 'employmenttype' => 'required|alpha_dash_space|max:155',
			// 'employmentstatus' => 'required|alpha_dash_space|max:155',
			// 'startdate' => 'required|date|max:155',
			// 'dateregularized' => 'required|date|max:155'
		]);
		
		$father = $request->father;
		$mother = $request->mother;
		$emergency_contact = $request->emergency_contact_name.'_'.$request->emergency_contact_relation.'_'.$request->emergency_number;

	  
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
			return redirect('personal/profile/add')->with('error', trans("Whoops! the ID Number is already taken."));
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
				'father'=>$father,
				'mother'=>$mother,
				'emergency_contact'=>$emergency_contact
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
		
		DB::table('users')->where('id',$request->id)->update(['reference' => $refId,'idno' => $idno]);

    	return redirect('personal/profile/view')->with('success', trans("Your profile has been added!"));
    }
	   
	public function profileEdit() 
	{
		$id = User::where('id',Auth::id())->first();
		$person_details = table::people()->where('idno',$id->idno)->first();

		return view('personal.edits.personal-profile-edit', compact('person_details'));
	}

	public function profileUpdate(Request $request) 
	{
	// dd($request);die();
		$user = User::where('id',Auth::id())->first();

		$v = $request->validate([
			// 'lastname' => 'required|alpha_dash_space|max:155',
			// 'firstname' => 'required|alpha_dash_space|max:155',
			// 'mi' => 'required|alpha_dash_space|max:155',
			// 'age' => 'required|digits_between:0,199|max:3',
			// 'gender' => 'required|alpha|max:155',
			// 'emailaddress' => 'required|email|max:155',
			// 'civilstatus' => 'required|alpha|max:155',
			// 'height' => 'required|digits_between:0,299|max:3',
			// 'weight' => 'required|digits_between:0,999|max:3',
			// 'mobileno' => 'required|max:155',
			// 'birthday' => 'required|date|max:155',
			// // 'nationalid' => 'required|max:155',
			// 'birthplace' => 'required|max:255',
			// 'homeaddress' => 'required|max:255',
		]);

		// $ref = \Auth::user()->reference;
		 // $ref = \Auth::user()->id;
// echo $ref;die();
		
		$father = $request->father;
		$mother = $request->mother;
		$emergency_contact = $request->emergency_contact_name.'_'.$request->emergency_contact_relation.'_'.$request->emergency_number;
		


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
		$birthplace = mb_strtoupper($request->birthplace);
		$homeaddress = mb_strtoupper($request->homeaddress);

		$file = $request->file('image');

	
		if($file != null) 
		{
				$name = $request->file('image')->getClientOriginalName();
				$destinationPath = public_path() . '/assets/faces/';
				$file->move($destinationPath, $name);

	
			table::people()->where('idno',$user->idno)->update([
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
				'homeaddress' => $homeaddress,
				'avatar' => $name,
				'father'=>$father,
				'mother'=>$mother,
				'emergency_contact'=>$emergency_contact
			]) ;


		} else {
			$name = '';
			
		table::people()->where('id',$user->idno)->update([
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
			'homeaddress' => $homeaddress,
			'father'=>$father,
			'mother'=>$mother,
			'emergency_contact'=>$emergency_contact,
			'avatar' => $name,
		]);

		}
		

	

    	return redirect('personal/profile/view')->with('success', trans("Updated!"));
	}

}

