<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Workspace;
use App\UserWorkspace;


use DB;
use App\Classes\table;
use App\Classes\permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;



class WorkspaceController extends Controller
{
    public function index(){
        $user = User::where('id',Auth::id())->first();
        if ($user->acc_type == 2) 
        {
            $data = DB::table('workspace')->join('users','workspace.created_by','=','users.id')->select('workspace.*','users.name')->get();
        } 
        else 
        {
            $data = DB::table('workspace')
            ->where('created_by',$user->id)
            ->join('users','workspace.created_by','=','users.id')
            ->select('workspace.*','users.name')
            ->get();
        }

        // $data = DB::table('workspace')->join('users','workspace.created_by','=','users.id')->select('workspace.*','users.name')->get();
        return view('admin.projects.workspace',compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);die();
        // print_r($request);
        // print_r($objUser);
        // die();
        $data = array();
     
       
        $request->validate([
            'workspace_name' => ['required', 'string', 'max:255'],
        ]);

        $data['workspace_name'] = $request->workspace_name;
        $data['slug'] = strtolower($request->workspace_name) ;
        $data['created_by'] = $request->id;
        $data['created_at'] = date('y-m-d h:s:i');
        
        $result = DB::table('workspace')->insertGetId($data);
        
        // dd($result);die();

        // $objUser->currant_workspace = $objWorkspace->id;
        // $objUser->update(); // Its from taskly and field not in our db
       

        if($result){


            $d = DB::table('userworkspaces')->insert([
                'user_id'=>$request->id,
                'workspace_id'=>$result,
                'permission'=>'owner',

            ]);
            if($d){
                return redirect()->route('workspace')->with('success',__('Workspace Created Successfully!'));
            }else{
                return redirect()->route('workspace')->with('error',__('Workspace Creation Failed..!!'));
            }


        }else 
          return redirect()->route('workspace')->with('error',__('Workspace Creation Failed..!!'));
         
    }

    public function ajaxupdate(Request $request)
    {
        $data = DB::table('workspace')->where('id',$request->id)->first();
       
        return  response()->json($data);
    }

    public function update(Request $request)
    {
        // dd($request);die();
        // print_r($request);
        // print_r($objUser);
        // die();
        $data = array();
     
       
        $request->validate([
            'workspace_name' => ['required', 'string', 'max:255'],
        ]);

        $data['workspace_name'] = $request->workspace_name;
        $data['slug'] = strtolower($request->workspace_name) ;
        $data['updated_at'] = date('y-m-d h:s:i');
        
        $result = DB::table('workspace')->where('id',$request->workspace_id)->update($data);
        
        // dd($result);die();

        // $objUser->currant_workspace = $objWorkspace->id;
        // $objUser->update(); // Its from taskly and field not in our db
       

        if($result){
            $d = 1;
            if($d){
                return redirect()->route('workspace')->with('success',__('Workspace updated Successfully!'));
            }else{
                return redirect()->route('workspace')->with('error',__('Workspace update Failed..!!'));
            }


        }else 
          return redirect()->route('workspace')->with('error',__('Workspace update Failed..!!'));
         
    }

    public function delete($id)
    {
        $objUser = Auth::user();
        $workspace = DB::table('workspace')->find($id);
        $project =  DB::table('projects')->where('project_workspace_id',$id)->get();
      
        if($workspace->created_by == $objUser->id) {
            DB::table('userworkspaces')->where('workspace_id', '=', $id)->delete();
            DB::table('workspace')->where('id',$id)->delete();
            if(isset($project)){
                foreach($project as $p){
                    DB::table('userprojects')->where('project_id',$p->id)->delete();
                }
                DB::table('projects')->where('project_workspace_id',$id)->delete();
            }
            return redirect()->route('workspace')->with('success',__('Workspace Deleted Successfully!'));
        }
        else{
            return redirect()->route('workspace')->with('error',__('You can\'t delete Workspace!'));
        }
    }

    public function view($id)
    {
        $objUser = Auth::user();
    

        $projectdata =  DB::table('projects')
        //->join('userprojects','projects.id','=','userprojects.project_id')
        ->join('workspace','projects.project_workspace_id','=','workspace.id')
        ->select('projects.*','workspace.workspace_name')
        // ->where('userprojects.user_id','=',$objUser->id)
        ->where('projects.project_workspace_id',$id)
        ->orderBy('projects.id','desc')
        ->get();

        // dd( $projectdata );die();

        // $projects = Project::select('projects.*')->join('user_projects','projects.id','=','user_projects.project_id')->where('user_projects.user_id','=',$objUser->id)->where('projects.workspace','=',$currantWorkspace->id)->get();

        $data = DB::table('workspace')->join('users','workspace.created_by','=','users.id')->select('workspace.*','users.name')->where('workspace.id',$id)->first();
        // dd( $data );die();
      

         return view('admin.projects.workspace-view',compact('data','projectdata'));
    }

}
