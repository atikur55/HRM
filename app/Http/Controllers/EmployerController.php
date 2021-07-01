<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use Image;

class EmployerController extends Controller
{
    public function index(){
    	$employer = Employer::get();
    	return view('admin.employer.index',compact('employer'));
    }

     public function add(Request $request){


       $addEmployer = new Employer;
    
     
       $addEmployer->c_name =$request->c_name;
       $addEmployer->trading_name =$request->trading_name;
       $addEmployer->unit_number =$request->unit_number;
       $addEmployer->complex =$request->complex;
       $addEmployer->street_number =$request->street_number;
       $addEmployer->street =$request->street;
       $addEmployer->district =$request->district;
       $addEmployer->city =$request->city;
       $addEmployer->code =$request->code;
       $addEmployer->sdl_exempt =$request->sdl_exempt;
       $addEmployer->logo =$request->logo;
       //  $addEmployer->trading_name ='abc';
       // $addEmployer->unit_number ='12';
       // $addEmployer->complex ='iert';
       // $addEmployer->street_number ='fgfh';
       // $addEmployer->street ='dfjjg';
       // $addEmployer->district ='efre';
       // $addEmployer->city ='rr';
       // $addEmployer->code =123;
       // $addEmployer->sdl_exempt ='eerwr';
        $imageName = time().'.'.$request->logo->extension();  
   
        $request->logo->move(public_path('images'), $imageName);

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
