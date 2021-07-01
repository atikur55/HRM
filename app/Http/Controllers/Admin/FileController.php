<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\File;
use Auth;
use Carbon\Carbon;

class FileController extends Controller
{
  public function file(){
      // $agents = User::where('role_id',1)->orWhere('role_id',2)->get();
      $user = User::where('id',Auth::id())->first();
      if ($user->acc_type == 2) 
      {
           $agents = User::where('role_id',1)->orWhere('role_id',2)->get();   
           $files = File::orderBy('id','desc')->get();
      }
      else 
      {
          $agents = User::where('user_id',$user->id)->Where('role_id',2)->get();
          $files = File::where('user_id',$user->id)->orderBy('id','desc')->get();
          
      }
      // $files = File::orderBy('id','desc')->get();
      return view('admin.fileupload',compact('agents','files'));
  }


  public function fileUploadPost(Request $request)
    {
        $file = $request->file;
        $mime = $file->getMimeType();
        //   dd($request);die();
           
           
        // $dat = new File ;
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,jpeg,bmp,png,csv,txt,doc,docx,pptx,ppt,xlsx,sql,mp4|max:10000',
        ]);

        $fileName = time().'.'.$request->file->extension();
        
     

// if (!in_array($mime, $supported_mime_types)) {
//   // mime type not validated
// }
// die();

        $path=$request->file->move(public_path('uploads'), $fileName);
        // echo $fileName;die();
        // print_r($path);
        //
        // dump($request);die();
        $f = File::insert([
            'user_id' => Auth::id(),
            'emp_name' => $request->employee,
            'file'=>$fileName,
            'file_title' => $request->file_title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);


        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }
    public function download($file){
        // echo $file;die();
      // $file= public_path(). "/uploads/";

        return Response()->download('uploads/'.$file);
    }

    public function delete($id){
        // $file= public_path(). "/uploads/";
 $file_delete=File::where('id', $id)->delete();
 return redirect()->back()->withSuccess('Deleted successfully');
         //  $file_delete = File::find($id);
         // $file_name = $file->file;
         //  $file_path = public_path("/upload/" . $file_name);;
         //  unlink($file_path);
         //  $file_delete->delete();
         // $file->delete($id);




      }

      public function destroy($id) {
   $news = File::findOrFail($id);
   $image_path = app_path("uploads/{$news->file}");

   if (File::exists($image_path)) {
       //File::delete($image_path);
       unlink($image_path);
   }
   $news->delete();

}
}
