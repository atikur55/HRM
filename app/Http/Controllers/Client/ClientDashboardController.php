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
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index() 
    {
        // if (permission::permitted('dashboard')=='fail'){ return redirect()->route('denied'); }
        $id = \Auth::user()->reference;
        $sm = date('m/01/Y');
        $em = date('m/31/Y');

        $cs = table::schedules()->where([
            ['reference', $id], 
            ['archive', '0']
        ])->first();

        $ps = table::schedules()->where([
            ['reference', $id],
            ['archive', '1'],
        ])->take(8)->get();

        $tf = table::settings()->value("time_format");

        $al = table::leaves()->where([['reference', $id], ['status', 'Approved']])->count();
        $ald = table::leaves()->where([['reference', $id], ['status', 'Approved']])->take(8)->get();
        $pl = table::leaves()->where([['reference', $id], ['status', 'Declined']])->orWhere([['reference', $id], ['status', 'Pending']])->count();
        $a = table::attendance()->where('reference', $id)->latest('date')->take(4)->get();

        $la = table::attendance()->where([['reference', $id], ['status_timein', 'Late Arrival']])->whereBetween('date', [$sm, $em])->count();
        $ed = table::attendance()->where([['reference', $id], ['status_timeout', 'Early Departure']])->whereBetween('date', [$sm, $em])->count();

        return view('client.client-dashboard', compact('cs', 'ps', 'al', 'pl', 'ald', 'a', 'la', 'ed', 'tf'));
    }

    public function contact(){
        // echo auth()->user()->id;die();
        $data = DB::table('client_contacts')->where('client_id',auth()->user()->id)->orderBy('id','DESC')->get();
        
        return view('client.client-contact',compact('data'));
    }

    public function storeContact(Request $request){
        $request->validate([
           'client_message'=>'required',
           'client_message_subject'=>'required',
        ]);
        $data = [];
        $data['client_name'] = $request->client_name;
        $data['client_message_subject'] = $request->client_message_subject;
        $data['client_email'] = $request->client_email;
        $data['client_message'] = $request->client_message;
        $data['client_id'] = $request->client_id;
        $data['created_at'] = date('Y-m-d H:s:i');

        
       $res = DB::table('client_contacts')->insert($data);
       if($res){
           return redirect()->back()->with('success','Message has been sent');
       }else{
        return redirect()->back()->with('error','Something wrong');
           
       }
        
    }

    public function project(){
        // echo auth()->user()->id;die();
        $data = DB::table('registered_client_projects')->where('client_id',auth()->user()->id)->get();
        
        return view('client.client-project',compact('data'));
    }

}

