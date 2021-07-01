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
class TaskController extends Controller
{
    public function task(){

        $taskdata = DB::table('tasks')->get();
        return view('admin.projects.task',compact($taskdata)); 

    }





    /* AJAX */
    
    public function showtaskajax(Request $request){
        if($request->ajax()){
            if($taskdbdata = DB::table('tasks')->where('task_project_id',$request->project_id)->orderBy('task_order','asc')->get()){
               
                return  response()->json($taskdbdata);
            }else{
                return  response()->json('Data Insertion failed! ');
            }
         
        }else{
            return  response()->json('Data not found from user end! ');
        }
    }

    public function storetaskajax(Request $request){

        if($request->ajax()){

            $data = array();
            $ass =  $request->_assignTo;
            $v = array();
            foreach($ass as $a){
                $d = DB::table('users')->where('idno',$a)->select('idno','name')->first();
                $str = $d->idno.'_'.$d->name;
                array_push($v,$str);

            }

            $assignTo = implode('+',$v);
           
            $data['task_assign_to'] = $assignTo;
            
            $data['task_name'] = $request->_task;
            $data['task_description'] = $request->_taskText;

            $data['task_start_date'] = $request->_startDate;
            $data['task_end_date'] = $request->_endDate;

            $data['task_priority'] = $request->_priority;
            $data['task_status'] = $request->_status;
            $data['task_order'] = 0;

            $data['task_project_id'] = $request->_projectid;
            $data['task_created_at'] = date('y-m-d h:s:i');
            
            $k = 0;

            if( DB::table('tasks')
            ->where('task_status',$request->_status)
            ->update([
                'task_order' => DB::raw('task_order + 2')
            ]) ){
                $k =1;
            }else{
                $k =1;
            }

            if($k==1 and $storedata = DB::table('tasks')->insert($data)){
              
                    return  response()->json('Task created successfully');
                }else{
                return  response()->json('Data Insertion failed! ');
            }

/* old*/
            // if($storedata = DB::table('tasks')->insertGetId($data)){
            //     for($i =0; $i<count($assignTo);$i++){


            //         if(DB::table('usertasks')->insert([
            //             'user_id'=>$assignTo[$i],
            //             'project_id'=>$request->_projectid,
            //             'task_id'=>$storedata 
            //         ])){
            //             $k = 1;
            //         }else{
            //             $k = 0;
            //         }


            //     }
            //     if($k==1){
            //         return  response()->json('Task created successfully');
            //     }
            //     else{
            //         return  response()->json('User Data Insertion failed! ');
            //     } 
            
            // }else{
            //     return  response()->json('Data Insertion failed! ');
            // }
/*old*/

        }else{
            return  response()->json('Data not found from user end! ');
        }

    }

    public function updatetaskajax(Request $request){

        if($request->ajax()){

            $data = array();
            $ass =  $request->_assignTo;
            $v = array();
            foreach($ass as $a){
                $d = DB::table('users')->where('idno',$a)->select('idno','name')->first();
                $str = $d->idno.'_'.$d->name;
                array_push($v,$str);

            }

            $assignTo = implode('+',$v);
           
            $data['task_assign_to'] = $assignTo;
            
            $data['task_name'] = $request->_taskValue;
            $data['task_description'] = $request->_taskTextValue;

            $data['task_start_date'] = $request->_startDateValue;
            $data['task_end_date'] = $request->_endDateValue;

            $data['task_priority'] = $request->_priorityValue;
            $data['task_updated_at'] = date('y-m-d h:s:i');
            
           
                

                try {
                    DB::table('tasks')->where('id',$request->_taskId)->update($data);
                    return  response()->json('Task updated successfully');

                } catch (\Exception $e) {
                    return  response()->json('Update failed');
                }

        }else{
            return  response()->json('Data not found from user end! ');
        }

    }


    public function update_draggable_status(Request $request){
        $status = explode('-',$request->parent_ui);
        
        $check_status = DB::table('tasks')
        ->where('id',$request->task_id)
        ->where('task_status',$status[1])
        ->first();


        if($check_status){
                    
            $i = 0;
            foreach($request->data_order_id as $k=>$v){
                $ores = DB::table('tasks')
                ->where('id',$k)
                ->update([
                    'task_order'=>$v
                ]);
                if($ores) $i++;
            }
            if($i == count($request->data_order_id)){
                    
                 return  response()->json('Task status and order updated successfully');
                    }else{
                        return  response()->json('i = '.$i.' count = '.count($request->data_order_id).$status[1].' Task ORDER could not be updated');
                    }

                 }


        $res = DB::table('tasks')
        ->where('id',$request->task_id)
        ->update([
                'task_status'=>$status[1]
                ]) ;
      

        if($res){
            $i = 0;
            $arr = array();
            foreach($request->data_order_id as $k=>$v){
               

                $ores = DB::table('tasks')
                ->where('id',$k)
                ->update([
                    'task_order'=>$v
                ]);
                $arr[$k] = $ores;
                
                if($ores) $i++;

            }
            $counts = array_count_values($arr);
            if(isset($counts['0'])) $counts = count($request->data_order_id)-$counts['0'];
            if(  $i == $counts){
                    
                 return  response()->json('Task status and order updated successfully');
            }else{
                return  response()->json('i = '.$i.' count = '.count($request->data_order_id).$status[1].'Task ORDER could not be updated');
            }
        }else{
            return  response()->json('Task status could not be updated');
        }
    }


    public function task_ajax_delete(Request $request){
        // if( DB::table('tasks')->where('id',$request->task_id)->delete() ){
        //     return  response()->json('Task deleted successfully');
        // }else{
        //     return  response()->json('Deletetion failed');
        // }

        try {
            DB::table('tasks')->where('id',$request->task_id)->delete();
            return  response()->json('Task deleted successfully');

        } catch (\Exception $e) {
            return  response()->json('Deletetion failed');
        }
    }









    /* prev */

    public function store($id,Request $request)
    {
        
        
        $data = array();
        
       /* cp */
       $user_id = $request->id;
        
        $currantWorkspace = DB::table('workspace')->where('id',$id)->first();

   

        $request->validate([
            'task_name' => 'required',
        ]);

        $objUser = Auth::user();

        $userList = [];
        if(isset($request['users_list'])) {
            $userList = $request['users_list'];
        }
        $userList = array_filter($userList);

        // dd($userList);die();

        /* old */
        
        $data['task_name'] = $request->task_name;
        $data['task_description'] = $request->task_description;
        $data['task_start_date'] = $request->task_start_date;
        $data['task_end_date'] = $request->task_end_date;
        $data['task_budget'] = $request->task_budget;
        $data['task_workspace_id'] = $currantWorkspace->id;
        $data['task_created_by'] = $user_id;
        $data['task_created_at'] = date('y-m-d h:s:i');
        
        $result = DB::table('tasks')->insertGetId($data);
        
        // dd($result);die();

        // $objUser->currant_task = $objWorkspace->id;
        // $objUser->update(); // Its from taskly and field not in our db
       

        if($result){
            $i = 0;
            for($i=0;$i<count($userList);$i++){
                DB::table('usertasks')->insert([
                    'user_id'=>$userList[$i],
                    'task_id'=>$result
    
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

    public function delete($id)
    {
        $objUser = Auth::user();
        $task = DB::table('tasks')->find($id);
        if($task->task_created_by == $objUser->id) {
            DB::table('usertasks')->where('task_id', '=', $id)->delete();
            DB::table('tasks')->where('id',$id)->delete();
            return redirect()->back()->with('success',__('Workspace Deleted Successfully!'));
        }
        else{
            return redirect()->back()->with('error',__('You can\'t delete Workspace!'));
        }
    }

    public function view($wid,$pid)
    {
        // echo $wid.' '.$pid;die();

        // $data = DB::table('tasks')->join('users','task.created_by','=','users.id')->select('task.*','users.name')->where('task.id',$id)->first();
        $data = null;
      
        
         return view('admin.projects.task-view',compact($data));
    }

    public function searchProjectUser(Request $request){
        $myRequest = $request->input('query');
        
        $sdata = DB::table('users')
                ->where("name","LIKE","%{$myRequest}%")
                ->get();

        $formatted_sdata = [];

                foreach ($sdata as $tag) {
                    $formatted_sdata[] = ['id' => $tag->id, 'name' => $tag->name];
                }
   
        return response()->json($formatted_sdata);

    }


 
    /* old */
    // public function task(){
    //     return view('admin.projects.task');
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
