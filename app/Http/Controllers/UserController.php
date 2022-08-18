<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;






class UserController extends Controller
{
    public function index()
    {
        $allusers = User::all();
        return view('pages.admin.change_password')->with('allusers',$allusers);
    }
 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // 
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
      $request->validate([
            'oldpass'=>'required|max:100',
            'newpass'=>'required|min:4|max:100',
            'confirmpass'=>'required|same:newpass',
        ]);
        $user = User::findOrFail($id);
        if (Hash::check($request->oldpass, $user->password)) { 
                $user->password=bcrypt($request->get('newpass'));
                $user->save();
                Toastr::success('Password has been updated','Success');
                return redirect()->route('staffs.index');
                
         }
         else{
            Toastr::error('Password has not been updated','Error');
                return redirect()->route('staffs.index');
            
        }
    }


    
    public function destroy($id)
    {
        
    }
}


       