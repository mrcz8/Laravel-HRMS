<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ChangepasswordController extends Controller
{
    public function index(){
        return view('pages.admin.change_password');
    }

    public function updatepassword(Request $request, $id){

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
                return redirect()->back();
         }
         else{
             
            Toastr::error('Password has not been updated','Error');
            return redirect()->back();
        }
        






    //    $user=User::find($id);
    //    $user->password=bcrypt($request->get('newpass'));
    //    $user->save();

        // $request->validate([
        //     'oldpass'=>'required|max:100',
        //     'newpass'=>'required|min:6|max:100',
        //     'confirmpass'=>'required|same:newpass',
        // ]);
            //Change Password
            // $user=User::find($id);
            // $user->password = bcrypt($request->get('newpass'));
            // $user->save();
            // return redirect()->back()->with("success","Password changed successfully !");

        // if (!(Hash::check($request->get('oldpass'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        // }
        // if(strcmp($request->get('newpass'), $request->get('newpass')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        // }
        // $user = Auth::user();
        // $user->password = bcrypt($request->get('newpass'));
        // $user->save();
    }
}
