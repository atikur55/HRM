<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Auth;
class ProjectController extends Controller
{
    public function project(){

        $projectdata = DB::table('projects')->get();
        return view('admin.projects.project',compact($projectdata)); 
    }

    public function store($id,Request $request)
    {
        
        
        $data = array();
        
       /* cp */
       $user_id =  Auth::user()->id;
    //    echo $id;die();
        
        $currantWorkspace = DB::table('workspace')->where('id',$id)->first();

   

        $request->validate([
            'project_name' => 'required',
        ]);

        $objUser = Auth::user();

        $userList = [];
        if(isset($request['users_list'])) {
            $userList = $request['users_list'];
        }
        $userList = array_filter($userList);

        // dd($userList);die();

        /* old */
        
        $data['project_name'] = $request->project_name;
        $data['project_description'] = $request->project_description;
        $data['project_start_date'] = $request->project_start_date;
        $data['project_end_date'] = $request->project_end_date;
        $data['project_budget'] = $request->project_budget;
        $data['project_workspace_id'] = $currantWorkspace->id;
        $data['project_created_by'] = $user_id;
        $data['project_created_at'] = date('y-m-d h:s:i');
        
        $result = DB::table('projects')->insertGetId($data);
        
        // dd($result);die();

        // $objUser->currant_project = $objWorkspace->id;
        // $objUser->update(); // Its from taskly and field not in our db
       

        if($result){
            $i = 0;
            for($i=0;$i<count($userList);$i++){
                DB::table('userprojects')->insert([
                    'user_id'=>$userList[$i],
                    'project_id'=>$result
    
                ]);
            }
        
            if($i == count($userList)){
                return redirect()->back()->with('success',__('Project Created Successfully!'));
            }else{
                return redirect()->back()->with('error',__('Project Creation Failed..!!'));
            }


        }else 
          return redirect()->back()->with('error',__('Project Creation Failed..!!'));
         
    }

    public function ajaxupdate(Request $request)
    {
        $data = DB::table('projects')->where('id',$request->id)->first();
        $userdata = DB::table('userprojects')->where('project_id',$request->id)->get();
        $arr = array();
        $i = 0;
        foreach($userdata as $k){
            $arr[$i++] = DB::table('users')->where('id',$k->user_id)->first();
        }

        $p = array();
        $p['data'] = $data;
        $p['userdata'] = $userdata;
        $p['users'] = $arr;
        return  response()->json($p);
    }

    public function ajaxstatusupdate(Request $request)
    {
        $s = $request->project_status;
        if($s == 'Ongoing'){
            $s = 'Finished';
        }elseif($s == 'Finished'){
            $s = 'OnHold';
        }elseif($s == 'OnHold'){
            $s = 'Ongoing';
        }
        $c = DB::table('projects')->where('project_created_by',Auth::user()->id)->where('id',$request->id)->first();
        if($c){
            $data = DB::table('projects')->where('id',$request->id)->update([
                'project_status'=>$s
            ]);
           if($data){
            return  response()->json($s);
           }else{
            return  response()->json('false');
           }
        }else{
            return  response()->json('false');
        }
      
       
    }

    public function update(Request $request)
    {
        // dd($request);die();
        // print_r(array_unique($request->users_list));
        // die();
        
        
        $data = array();
        
       /* cp */
       $user_id = $request->id;
        
        $project_id = $request->project_id;
   

        $request->validate([
            'project_name' => 'required',
        ]);

        $objUser = Auth::user();

        $userList = [];
        if(isset($request['users_list'])) {
            $userList = $request['users_list'];
        }
        $userList = array_filter(array_unique($userList));

        // dd($userList);die();

        /* old */
        
        $data['project_name'] = $request->project_name;
        $data['project_description'] = $request->project_description;
        $data['project_start_date'] = $request->project_start_date;
        $data['project_end_date'] = $request->project_end_date;
        $data['project_budget'] = $request->project_budget;
        $data['project_updated_at'] = date('y-m-d h:s:i');
        
      
        
        // try {
        //     $result = DB::table('projects')->where('id',$project_id)->update($data);
        //     if($result) echo 'success';
        //     else echo 'failed';
        //     die();
        //     return  response()->json('Task updated successfully');

        // } catch (\Exception $e) {
        //     echo $e; die();
        // }
        
        // dd($result);die();

        // $objUser->currant_project = $objWorkspace->id;
        // $objUser->update(); // Its from taskly and field not in our db
        
        $vr = DB::table('userprojects')->where('project_id',$project_id)->get();

            // echo '====vr====<br>';
            // echo '<pre>';
            // print_r($vr);
            // echo '</pre>';
            // echo '<br>';

        
            foreach($vr as $b){
             
                // echo '<===user>';
                // echo '<pre>';
                // print_r($userList);
                // echo '</pre>';
                // echo '<===br>';
                // Search
                $pos = array_search($b->user_id, $userList);

                // echo $b->user_id.' found at: ' . $pos;

                // Remove from array
                unset($userList[$pos]);

                // print_r($userList);
            }

            // echo '<================================br>';
            // echo '<pre>';
            // print_r(array_values($userList));
            // echo '</pre>';
            // echo '<===br>';
            // die();
            $userList = array_values($userList);
        $result = DB::table('projects')->where('id',$project_id)->update($data);
        


                
        if($result){
            $j = 0;
            for($i=0;$i<count($userList);$i++){
                // dd($userList);die();
               if(
                   DB::table('userprojects')->insert([
                        'user_id'=>$userList[$i],
                        'project_id'=>$project_id
                 ])
            
            ) {
                $j++;
            }
            }
        
            if($j == count($userList)){
                $vr = DB::table('userprojects')->where('project_id',$project_id)->get();
                // echo '<pre>';
                //     print_r($vr);
                //     echo '</pre>';
                //     echo '<br>';
         
                // echo 'User list updated '.count($userList).' j='.$j;die();
                return redirect()->back()->with('success',__('Project updated Successfully!'));
            }else{
                // echo 'NOT updated';die();
                return redirect()->back()->with('error',__('Project update Failed..!!'));
            }


        }else 
          return redirect()->back()->with('error',__('Project update Failed..!!'));
         
    }

    public function delete($id)
    {
        $objUser = Auth::user();
        $project = DB::table('projects')->find($id);
        $wp = DB::table('users')->where('id',$project->project_created_by)->first();
        echo $project->project_created_by.' - ';
        // dd($objUser );die();

        if($project->project_created_by == $objUser->id) {
            DB::table('userprojects')->where('project_id', '=', $id)->delete();
            DB::table('projects')->where('id',$id)->delete();
            return redirect()->back()->with('success',__('Project Deleted Successfully!'));
        }
        else{
            return redirect()->back()->with('error',__('You can\'t delete '. $wp->name.'\'s project!'));
        }
    }

    public function view($wid,$pid)
    {
        // echo $wid.' '.$pid;die();

        $projectdata = DB::table('projects')
            // ->join('users','projects.project_created_by','=','users.id')
            ->join('workspace','projects.project_workspace_id','=','workspace.id')
            // ->select('projects.*','users.name','workspace.workspace_name')
            ->select('projects.*','workspace.workspace_name')
            ->where('projects.id',$pid)
            ->where('workspace.id',$wid)
            ->first();
            // dd( $projectdata);die();
     $data  = DB::table('userprojects')
        ->join('users','userprojects.user_id','=','users.id')
        ->join('projects','userprojects.project_id','=','projects.id')
        ->select('userprojects.*','users.name','projects.project_name','users.idno')
        ->where('projects.id',$pid)
        ->get();

    //   dd($projectuserdata);
    // $data = array();
        // $data = DB::table('tasks')
        // ->join('users','projects.project_created_by','=','users.id')
        // ->join('users','projects.project_created_by','=','users.id')
        // ->join('workspace','projects.project_workspace_id','=','workspace.id')
        // ->select('projects.*','users.name','workspace_name')
        // ->where('projects.id',$pid)
        // ->where('workspace.id',$wid)
        // ->first();

        return view('admin.projects.project-view',['data'=>$data,'projectdata'=>$projectdata]);
    }

    public function searchProjectUser(Request $request){
        $myRequest = $request->input('query');
        
        $sdata = DB::table('users')
                ->whereNotNull('idno')
                ->where("name","LIKE","%{$myRequest}%")
                ->get();

        $formatted_sdata = [];

                foreach ($sdata as $tag) {
                    $formatted_sdata[] = ['id' => $tag->id, 'name' => $tag->name];
                }
   
        return response()->json($formatted_sdata);

    }



    /* old */
    // public function project(){
    //     return view('admin.projects.project');
    // }
    public function todo(){
        return view('admin.projects.todo');
    }
    public function todoadd(Request $request){

        
        // DB::table('todos')->insert([
        //     'title' => $request->Code, //This Code coming from ajax request
        //     'details' => $request->Chief, //This Chief coming from ajax request
        // ]);


        return response()->json(
            [
                'data' => $request->task,
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );

        // return view('admin.projects.todo');
    }
}
