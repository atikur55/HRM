<?php

namespace App\Http\Controllers;


use App\Client;
use App\ClientWorkspace;
use App\Utility;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Auth;




class ClientController extends Controller
{
    public function index(){
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

        $user = User::where('id',Auth::id())->first();
        if ($user->acc_type == 2) 
        {
            $data =  DB::table('client')
                   ->join('users','client.client_created_by','=','users.id')
                   ->select('client.*','users.name')
                   ->get();
        } 
        else 
        {
            $data =  DB::table('client')
                   ->where('client_created_by',$user->id)
                   ->join('users','client.client_created_by','=','users.id')
                   ->select('client.*','users.name')
                   ->get();
            // dd($data);die();
        }
       // $data =  DB::table('client')
       // ->join('users','client.client_created_by','=','users.id')
       // ->select('client.*','users.name')
       // ->get();
        return view('admin.client.client',compact('data'));
    
    }
    public function newclient(){
        
        return view('admin.client.newclient');
    }

    public function clientstore(Request $request){
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

        $data['client_name'] = $request->client_name;
        $data['client_email'] = $request->client_email;
        $data['client_mobile'] = $request->client_mobile;
        $data['client_company'] = $request->client_company;

        $data['client_address'] = $request->client_address;
        $data['client_priority'] = $request->client_priority;
        $data['client_website'] = $request->client_website;
        $data['client_note'] = $request->client_note;

        $data['client_created_by'] = $request->client_created_by;
        


        if(DB::table('client')->insert($data)){
            return redirect()->route('client')->with('success','Client Created Successfully');
        }else{
            return redirect()->back()->with('error','Client Creation failed');
        }
    
    }

    public function clientedit($id){
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }
       $data =  DB::table('client')
                ->where('client.id',$id)
                ->join('users','client.client_created_by','=','users.id')
                ->select('client.*','users.name')
                ->first();
        return view('admin.client.clientedit',compact('data'));
    
    }

    
    public function clientupdate(Request $request,$id){
        if (permission::permitted('employees')=='fail'){ return redirect()->route('denied'); }

        $data['client_name'] = $request->client_name;
        $data['client_email'] = $request->client_email;
        $data['client_mobile'] = $request->client_mobile;
        $data['client_company'] = $request->client_company;

        $data['client_address'] = $request->client_address;
        $data['client_priority'] = $request->client_priority;
        $data['client_website'] = $request->client_website;
        $data['client_note'] = $request->client_note;
        $data['client_meeting_date'] = $request->client_meeting_date;

        $data['client_updated_by'] = $request->client_updated_by;
        
        if(DB::table('client')->where('id',$id)->update($data))
        {
            return redirect()->route('client')->with('success','Client Updated Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Client Update failed');
        }
    
    }

    public function clientdelete($id){
        if(DB::table('client')->where('id',$id)->delete()){
            return redirect()->route('client')->with('success','Client Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Client Delete failed');
        }
    }

    public function registeredClient(){
        // $clientData = DB::table('users')->where('role_id',3)->orderBy('id','DESC')->get();
        // if($clientData ) 
        $user = User::where('id',Auth::id())->first();
        if ($user->acc_type == 2) 
        {
            $clientData = DB::table('users')->where('role_id',3)->orderBy('id','DESC')->get();
        } 
        else 
        {
            $clientData = DB::table('client')->where('client_created_by',$user->id)->orderBy('id','DESC')->get();
            // dd($clientData);die();
        }
        return view('admin.client.registered_client',compact('clientData'));
    }
    public function registeredClientDelete($id){
        // $res = DB::table('users')->where('id',$id)->delete();
        $user = User::where('id',Auth::id())->first();
        if ($user->acc_type == 2) 
        {
            $res = DB::table('users')->where('id',$id)->delete();
        } 
        else 
        {
            $res = DB::table('client')->where('id',$id)->delete();
            // dd($clientData);die();
        }
       if($res) return redirect()->back()->with('success','Client Deleted successfully');
       else return redirect()->back()->with('error','Client Delete failed');
    }

    public function clientMessage(){
        // $clientMessageData = DB::table('client_contacts')
        //                 ->join('users','users.id','=','client_contacts.client_id')
        //                 ->select('client_contacts.*','users.*')
        //                 ->get();

        $user = User::where('id',Auth::id())->first();
        if ($user->acc_type == 2) 
        {
            $clientMessageData = DB::table('client_contacts')
                        ->join('users','users.id','=','client_contacts.client_id')
                        ->select('client_contacts.*','users.*')
                        ->get();
        } 
        else 
        {
            $clientMessageData = DB::table('client_contacts')
                        ->join('users','users.id','=','client_contacts.client_id')
                        ->select('client_contacts.*','users.*')
                        ->get();
        }

       if($clientMessageData ) return view('admin.client.client_message',compact('clientMessageData'));
    }

    public function clientMessageDelete($id){
        $res = DB::table('client_contacts')->where('id',$id)->delete();
        if($res) return redirect()->back()->with('success','Client Message Deleted successfully');
        else return redirect()->back()->with('error','Client Message Delete failed');
    
        }

        public function registeredClientProject(){
            $clientData = DB::table('users')->where('role_id',3)->get();
            $clientProjectData = DB::table('registered_client_projects')->get();
            return view('admin.client.registered_client_project',compact('clientData','clientProjectData'));
         
        }

        public function registeredClientProjectStore(Request $request){
            // dd($request);die();
            $data = [];
            $data['client_id'] = $request->client_id;
            
            $data['project_deadline'] = $request->project_deadline;
            $data['project_name'] = $request->project_name;
            
            $data['project_details'] = $request->project_details;
            
            $data['created_at'] = date('Y-m-d H:s:i');

            $res = DB::table('registered_client_projects')->insert($data);
            if($res) return redirect()->back()->with('success','Client Project created successfully');
            else return redirect()->back()->with('error','failed');
        }

        public function registeredClientProjectEdit($id){
         
            $clientProjectData = DB::table('registered_client_projects')->where('id',$id)->first();
            // dd($clientProjectData);die();
            $clientData = DB::table('users')->where('role_id',3)->where('id',
            $clientProjectData->client_id)->first();

            return view('admin.client.registered_client_project_edit',compact('clientData','clientProjectData'));
         
        }

        
        public function registeredClientProjectUpdate(Request $request){
            // dd($request);die();
            $data = [];
            $data['client_id'] = $request->client_id;
            
            $data['project_deadline'] = $request->project_deadline;
            $data['project_name'] = $request->project_name;
            
            $data['project_details'] = $request->project_details;
            
            $data['updated_at'] = date('Y-m-d H:s:i');

            $res = DB::table('registered_client_projects')->where('id',$request->id)->update([
                'project_deadline'=> $request->project_deadline,
                'project_name'=> $request->project_name,
                'project_details'=> $request->project_details,
                'updated_at'=>    $data['updated_at'],
                
            ]);
            if($res) return redirect()->back()->with('success','Client Project updated successfully');
            else return redirect()->back()->with('error','failed');
        }


        public function registeredClientProjectStatus($id){
            $status = '';
            $d =  DB::table('registered_client_projects')->where('id',$id)->first();
            if($d->project_status == 'Pending'){
                $status = 'Running';
            }
            if($d->project_status == 'Running'){
                $status = 'Complete';
            }
            if($d->project_status == 'Complete'){
                $status = 'Pending';
            }

            $res = DB::table('registered_client_projects')->where('id',$id)->update([
                'project_status'=>$status
            ]);
            if($res) return redirect()->back()->with('success','ClientProject updated successfully');
            else return redirect()->back()->with('error','Client Project update failed');
        }

        public function registeredClientProjectDelete($id){
            $res = DB::table('registered_client_projects')->where('id',$id)->delete();
            if($res) return redirect()->back()->with('success','ClientProject Deleted successfully');
            else return redirect()->back()->with('error','Client Project Delete failed');
        }
}
