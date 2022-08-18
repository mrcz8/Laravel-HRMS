<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Staff;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    
    public function index()
    {
        $allusers = User::all();
        $staffs = Staff::all();
        $agents = DB::table('users')
            ->leftJoin('staffs', 'staffs.user_id', '=', 'users.id')
            ->get();
        return view('pages.admin.users', compact('staffs','agents','allusers'));

    }

    public function create()
    {
        //
    }

    public function store(Request $req)
    {
        $user=New User;
        $user->rank='staff';
        $user->username=$req->username;
        $user->password=Hash::make($user->username);
        $user->save();

        $staffs=new Staff;
        $staffs->user_id=$user->id;
        $staffs->fname=$req->fname;
        $staffs->lname=$req->lname;
        $staffs->save();
        Toastr::success('User has been added','Success');
        return redirect()->back();
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $users = User::find(Auth::user()->id);
        return view('pages.admin.users',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $staffs=Staff::find($id);
        $username=User::find($staffs->user_id);
        $staffs->fname=$request->fname;
        $staffs->lname=$request->lname;
        $username->username=$request->username;
        $staffs->save();
        $username->save();
        Toastr::success('Users credentials has been updated','Success');
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        // DB::table("staffs")->where("id", $id)->delete();
        $staffs=Staff::find($id);
        $user=User::find($staffs->user_id);
        $user->delete();
        $staffs->delete();
        Toastr::success('User has been removed','Success');
        return redirect()->back();
    }

    public function resetpassword(Request $request, $id)
    {
        // $users = User::find($id);
        // $users->username = $request->current_password;
        // Toastr::success('Password has been reset','Success');
        // return redirect()->back();
        // return ($id);
        

                //   $users =User::find($id);
                //   $users->password = bcrypt($request->newpassword);
                //   $users->save();

                //    return redirect()->back();
    
        // return ($id);
    }
}