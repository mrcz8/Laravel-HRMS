<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Agent;
use App\Models\Contract;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class AccountController extends Controller
{
 
    public function index()
    {
        $accounts = Account::all();
        $contracts = Contract::all();
        return view('pages.admin.accounts', compact('accounts','contracts'));
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
        $accounts = new Account;
        $accounts->account_name=$request->account_name;
        $accounts->save();
        Toastr::success('Account has been added','Success');
        return redirect()->back();

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accounts=Account::find($id);
        $accounts->account_name=$request->account_name;
        $accounts->save();
        Toastr::success('Account has been updated','Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accounts=Account::find($id);
        $accounts->delete();
        Toastr::success('Account has been removed','Success');
        return redirect()->back();
    }
    public function addcontracts(Request $request)
    {
        $contracts = new Contract;
        $contracts->contract_name=$request->contract_name;
        $contracts->save();
        Toastr::success('Contract has been added','Success');
        return redirect()->back();

    }
    public function updatecontracts(Request $request, $id)
    {
        $contracts=Contract::find($id);
        $contracts->contract_name=$request->contract_name;
        $contracts->save();
        Toastr::success('Contract has been updated','Success');
        return redirect()->back();
    }
    public function deletedestroy($id)
    {
        $contracts=Contract::find($id);
        $contracts->delete();
        Toastr::success('Contract has been removed','Success');
        return redirect()->back();
    }
   
}


