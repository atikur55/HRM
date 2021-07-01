<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EmpoyerFilling;

class EmployerFillingController extends Controller
{
   public function index(){
    	$employer = EmpoyerFilling::get();
    	return view('admin.employer_filling.index',compact('employer'));
    }

     public function add(Request $request){

     
       $addEmployer = new EmpoyerFilling;
    
     	
       $addEmployer->c_name =$request->c_name;
       $addEmployer->pay_number =$request->pay_number;
       $addEmployer->uif_number =$request->uif_number;
       $addEmployer->c_register =$request->c_register;
       $addEmployer->same_as_residential =$request->same_as_residential;
       $addEmployer->lin1 =$request->lin1;
       $addEmployer->lin2 =$request->lin2;
       $addEmployer->lin3 =$request->lin3;
       $addEmployer->code =$request->code;
       // $addEmployer->city =$request->city;
       // $addEmployer->code =$request->code;
     
       //  $addEmployer->pay_number ='123';
       // $addEmployer->uif_number ='124';
       // $addEmployer->lin1 ='iert';
       // $addEmployer->lin2 ='fgfh';
       // $addEmployer->line3 ='dfjjg';
       // $addEmployer->code ='1234';
      

       // //upload Image
         // if ($request->hasFile('logo')) {
         // $logo_tmp = $request->file('logo');
         // if ($logo_tmp->isValid()) {
         // $extension = $logo_tmp->getClientOriginalExtension();
         // $filename=rand(111,99999).'.'.$extension;
         // $large_logo_path = 'uploads/info/'.$filename;
      
         // Image::make($logo_tmp)->resize(600,600)->save($large_logo_path);
       
         //    $addEmployer->logo =$filename;
         // }
         // }
   
       $addEmployer->save();

       return back()->with('success','Add Info Added Successfully');
      

  
      return view('admin.app-info.index')->with('success','Add Info Added Successfully');
		    }


		      public function update(Request $request,$id=null){

		      	$this->validate($request,[
			      'name' => 'required',
			      'image' => 'nullable|image',
			    ],
			   [

			     'name.required' => 'Please provide a brand name',
			      'image.image' => 'Please provide a valid image with .jpg, .png, .jpeg ',
			   ]);
		      	 if ($request->isMethod('post')) {
			      $data = $request->all();
			      // echo "<pre>"; print_r($data); die;
			     
			      if ($request->hasFile('image')) {
			      $image_tmp = $request->file('image');
			      if ($image_tmp->isValid()) {
			      $extension = $image_tmp->getClientOriginalExtension();
			      $filename=rand(111,99999).'.'.$extension;
			      $large_image_path = 'uploads/info/'.$filename;
			      

			      Image::make($image_tmp)->save($large_image_path);
			   
			}
			    }else if(!empty($data['current_image'])) {
			        $filename = $data['current_image'];
			    }else{
			      $filename ='';
			    }

				      Employer::where(['id'=>$id])->update(['name'=>$data['name'],'image'=>$filename]);

				     
				    }

				   return redirect()->back()->with('success',' Info update Successfully');
				      
				    }

  

		  public function delete($id=null){

				    $employer = Employer::find($id);
			    if(!is_null($employer)){

			      if (File::exists('uploads/info/'.$employer->image)) {
			        File::delete('uploads/info/'.$employer->image);
			      }
			      $employer->delete();
			    }

     				 return redirect()->back()->with('success',' Info Delete Successfully');
		    }
}
