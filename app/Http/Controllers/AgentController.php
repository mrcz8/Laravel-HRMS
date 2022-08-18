<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Benefit;
use App\Models\Contract;
use App\Models\Contact_person;
use App\Models\Account;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Input;





class AgentController extends Controller
{
    
    public function index()
    {
        $allagents = Agent::all();
        $allaccounts = Account::all();
        $allcontracts = Contract::all();
        $agents = DB::table('agents')
                ->leftJoin('benefits', 'benefits.agent_id', '=', 'agents.id')
                ->leftJoin('contact_persons', 'contact_persons.agent_id', '=', 'agents.id')
                ->leftJoin('accounts', 'accounts.id', '=', 'agents.account_id')
                ->leftJoin('contracts', 'contracts.id', '=', 'agents.contract_id')
                ->get();
        return view('pages.admin.agent',compact('allagents','agents','allaccounts','allcontracts'));
        // $agents = Agent::all();
        // $benefits = Benefit::all();
        // return view('pages.admin.agent',compact('agents','accounts','benefits'));
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $agents = new Agent;
        $agents->bio_no=$request->bio_no;
        $agents->emp_no=$request->emp_no;
        $agents->account_id=$request->account_name;
        $agents->name=$request->name;
        $agents->address=$request->address;
        $agents->contact_no=$request->contact_no;
        $agents->date_of_birth=$request->date_of_birth;
        $agents->date_hired=$request->date_hired;
        $agents->contract_id=$request->contract_name;
        $agents->status=1;
        $agents->save();

        $benefits = new Benefit;
        $benefits->agent_id=$agents->id;
        $benefits->tin=$request->tin;
        $benefits->sss=$request->sss;
        $benefits->philhealth=$request->philhealth;
        $benefits->pag_ibig=$request->pag_ibig;
        $benefits->save();
        
        $contact_persons = new Contact_person;
        $contact_persons->agent_id=$agents->id;
        $contact_persons->c_person=$request->c_person;
        $contact_persons->relationship=$request->relationship;
        $contact_persons->e_address=$request->e_address;
        $contact_persons->e_contact=$request->e_contact;
        $contact_persons->save();

        Toastr::success('Employee has been added','Success');
        return redirect()->back();
    }

    
    public function show($id)
    {
        return redirect()->back();
    } 

    
    public function edit($id)
    {
        return redirect()->back();

    }

    
    public function update(Request $request, $agent_id)
    {
        $agents=Agent::find($agent_id);
        $agents->bio_no=$request->input("bio_no");
        $agents->emp_no=$request->input("emp_no");
        $agents->name=$request->input("name");
        $agents->address=$request->input("address");
        $agents->contact_no=$request->input("contact_no");
        $agents->account_id=$request->input("account_name");
        $agents->date_of_birth=$request->input("date_of_birth");
        $agents->date_hired=$request->input("date_hired");
        $agents->contract_id=$request->input("contract_name");
        $agents->status_info=$request->input("status_info");
        $agents->save();

        $benefits=Benefit::find($agent_id);
        $agents->benefits->tin=$request->input("tin");
        $agents->benefits->sss=$request->input("sss");
        $agents->benefits->philhealth=$request->input("philhealth");
        $agents->benefits->pag_ibig=$request->input("pag_ibig");
        $agents->benefits->save();

        $contact_persons=Contact_person::find($agent_id);
        $agents->contact_persons->c_person=$request->c_person;
        $agents->contact_persons->relationship=$request->relationship;
        $agents->contact_persons->e_address=$request->e_address;
        $agents->contact_persons->e_contact=$request->e_contact;
        $agents->contact_persons->save();
        
        Toastr::success('Employee has been updated','Success');
        return redirect()->back();
    }

    
    public function destroy($agent_id)
    {
        $agents = Agent::where('id',$agent_id)->firstOrFail();
        $agents->delete();
        Toastr::success('Employee has been removed','Success');
        return redirect()->back();
        // return ($agent_id);
    }
    public function updatestatus(Request $request, $agent_id)
    {
        $agents=Agent::find($agent_id);
        if($agents->status==0){
            $agents->status=1;
            $agents->save();
            return redirect()->back();
        }
        $agents->status=0;
        $agents->save();
        return redirect()->back();
        // return ($agent_id);
    }
    

}
