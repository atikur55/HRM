<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function theme()
    {
        $id = '';
        $v ='';
        $a = '';
        if(isset($_GET['id']) and isset($_GET['v']) ){
            $id = $_GET['id'];
             $v = $_GET['v'];
             $a = $_GET['r'];
        }

        $chk = DB::table('themes')->where('user_id',$id)->first();
        if($chk){
            if( DB::table('themes')->where('user_id',$id)->update([
                'user_id'=>$id,
                'theme'=>$v] ) )
                return redirect()->back(); 

                // if($a == 'admin')
                //   return redirect('dashboard');
                // elseif($a == 'employee')
                // return redirect('personal/dashboard');

        }else{
            if( DB::table('themes')->insert([
                'user_id'=>$id,
                'theme'=>$v] ) ) 
                return redirect()->back(); 

                // if($a == 'admin')
                // return redirect('dashboard');
                // elseif($a == 'employee')
                // return redirect('personal/dashboard');
        }
    
        // echo $id.' '.$v;

        // if(DB::table('themes')->insert
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
