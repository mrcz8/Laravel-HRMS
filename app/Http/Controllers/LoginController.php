<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->rank=='admin'){
                Toastr::success('Login successfuly ','Success');
                return redirect()->route('staffs.index');
            }
            elseif(Auth::user()->rank=='staff'){
                Toastr::success('Login successfuly ','Success');
                return redirect()->route('active.index');    
            }
        }

        return back()->withErrors([
            Toastr::error('Invalid Credentials ','Error')
        ]);
        
    }
}
