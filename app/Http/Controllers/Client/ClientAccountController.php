<?php
/*
* Workday - A time clock application for employees
* Email: official.codefactor@gmail.com
* Version: 1.1
* Author: Brian Luna
* Copyright 2020 Codefactor
*/
namespace App\Http\Controllers\Client;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ClientAccountController extends Controller
{
    public function viewUser(Request $request) 
    {
        $myuser = table::users()->where('id', \Auth::user()->id)->first();
        $myrole = table::roles()->where('id', $myuser->role_id)->value('role_name');
        
        return view('client.client-update-user', compact('myuser', 'myrole'));
    }

    public function viewPassword() 
    {
        return view('client.client-update-password');
    }

    public function updateUser(Request $request) 
    {
		$v = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
		]);

        $id = \Auth::id();
        $name = mb_strtoupper($request->name);
        $email = mb_strtolower($request->email);

        if($id == null) 
        {
            return redirect('client/update-user')->with('error', trans("Whoops! Please fill the form completely."));
        }

        table::users()->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
        ]);

        return redirect('client/update-user')->with('success', trans("ser Account has been updated!"));
    }

    public function updatePassword(Request $request) 
    {
        $v = $request->validate([
            'currentpassword' => 'required|max:100',
            'newpassword' => 'required|min:8|max:100',
            'confirmpassword' => 'required|min:8|max:100',
        ]);

        $id = \Auth::id();
        $p = \Auth::user()->password;
        $c_password = $request->currentpassword;
        $n_password = $request->newpassword;
        $c_p_password = $request->confirmpassword;

        if($id == null) 
        {
            return redirect('client/update-user')->with('error', trans("Whoops! Please fill the form completely."));
        }
        
        if($n_password != $c_p_password) 
        {
            return redirect('client/update-password')->with('error', trans("New password does not match."));
        }

        if(Hash::check($c_password, $p)) 
        {
            table::users()->where('id', $id)->update([
                'password' => Hash::make($n_password),
            ]);

            return redirect('client/update-password')->with('success', trans("User password has been updated!"));
        } else {
            return redirect('client/update-password')->with('error', trans("Oops! current password does not match."));
        }
    }
}

