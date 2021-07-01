<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SendLoginDetail;
use App\User;
use App\UserProject;
use App\UserWorkspace;
use App\Utility;
use App\Mail\SendWorkspaceInvication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Config;
use Illuminate\Support\Facades\DB;


class PassportController extends Controller
{
    public function createToken(){
        $user = User::first();
        // dd($user);die();
        $token = $user->createToken('EITDEV')->accessToken;
        return $token;
    }
    public function register(Request $request){
        $this->validation($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
     
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $token = $user->createToken('EITDEV')->accessToken;

        return response()->json(['token'=>$token],200);

    }
    public function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password'=>$request->password,
        ];

        // echo 'token = '.$token=auth()->user()->createToken('EITDEV')->accessToken;
        // echo '<br>';
        // echo '<pre>';
        // print_r($request);
        // echo '</pre>';
        // echo '<br>';
        // die();
        // return response()->json(['r'=>$request],200);

        if(auth()->attempt($credentials)){
            $token=auth()->user()->createToken('EITDEV')->accessToken;
            $user = auth()->user();
            $d = '';
            if($user->role_id == 3){
                $d =  DB::table('users')
                        ->where('users.id',$user->id)
                        ->first();
                        $user->setAttribute('token',$token);

            }elseif($user->role_id == 2){
                $d =  DB::table('users')->join('tbl_people','users.reference','=','tbl_people.id')->where('users.id',$user->id)->select('tbl_people.avatar')->first();
                $user->setAttribute('token',$token);
                $user->setAttribute('avatar',$d->avatar);
            }
          
          
            // $user->tokan($token);
         
        //   var_dump($user);die();
            return response()->json(['user'=>$user],200);
        }else{
            return response()->json(['error'=>'UnAthorized'],401);
        }
    }

    public function details(){
        // return true;
        // die();
        return response()->json(['user'=>auth()->user()],200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
