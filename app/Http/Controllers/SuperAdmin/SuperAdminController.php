<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    function create(Request $request){
        //validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',

        ]);
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= \Hash::make($request->password);
        $save=$user->save();

        if($save){
            return redirect()->back()->with('success','You Will Registered Successfully');            
        }
        else{
            return redirect()->back()->with('fail','Something Went Wrong, Failed To Register');            

        }
    }

    function check(Request $request){
        //validate input
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This emial is not exists in our record'
        ]);

        $checks = $request->only('email','password');
        if(Auth::attempt($checks)){
            return redirect()->route('SuperAdmin.home');
        }
        else{
            return redirect()->route('SuperAdmin.login')->with('fail','Incorrect credentails');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
