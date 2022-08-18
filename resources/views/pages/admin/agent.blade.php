@extends('layout.master')
@section('title')
    Employee
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@stop

@section('content')
<!-- Button trigger modal -->
<button class="btn mt-3" data-bs-toggle="modal" data-bs-target="#addModal" style="font-size:15px;width:130px;height:35px; color:black; background-color:#faad26;">
 <b>Add Employee</b>
</button>
{!! Toastr::message() !!}
<!-- Modal -->

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><b>Employee Information</b></h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('agents.store')}}" method="post">
                    @csrf                        
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="bio_no" placeholder="Bio #" required>
                        <input type="text" class="form-control mb-1 shadow" name="emp_no" placeholder="Employee Number" required>
                        <input type="text" class="form-control mb-1 shadow" name="name" placeholder="Name" style="text-transform:uppercase" required>

                        <input type="text" class="form-control mb-1 shadow" name="address" placeholder="Address" style="text-transform:uppercase" required>
                        <input type="text" class="form-control mb-1 shadow" name="contact_no" placeholder="Contact Number" required>
                        <h6 class="modal-title mt-1"><b>Account:</b></h6>
                        <select class="form-select form-control  mb-1 shadow" name="account_name" required>
                            @foreach($allaccounts as $account)
                            <option value="{{$account->id}}">{{$account->account_name}}</option>
                            @endforeach
                        </select>
                        <h6 class="modal-title mt-1"><b>Contract Type:</b></h6>
                        <select class="form-select form-control  mb-1 shadow" name="contract_name" required>
                            @foreach($allcontracts as $contract)
                            <option value="{{$contract->id}}">{{$contract->contract_name}}</option>
                            @endforeach
                        </select>
                        <label class="mt-1">Date Of Birth:<br>
                        <input type="date" class="form-control mb-1 shadow" name="date_of_birth" placeholder="Date of Birth"required>
                        </label>
                        <label class="mt-1 ml-2">Date Hired:<br>
                        <input type="date" class="form-control mb-1 shadow" name="date_hired" placeholder="Date Hired"required>
                        </label>
                        <br>

                    <!-- Benefit -->
                        <h6 class="modal-title mt-1"><b>Benefit:</b></h6>
                        <input type="text" class="form-control mb-1 shadow mt-1" name="tin" placeholder="Tin Number">
                        <input type="text" class="form-control mb-1 shadow" name="sss" placeholder="SSS Number">
                        <input type="text" class="form-control mb-1 shadow" name="philhealth" placeholder="PhilHealth Number">
                        <input type="text" class="form-control mb-1 shadow" name="pag_ibig" placeholder="Pag-Ibig Number">

                    <!-- Emergency -->
                        <h6 class="modal-title mt-1"><b>Person in case of Emergency:</b></h6>
                        <input type="text" class="form-control mb-1 shadow mt-1" name="c_person" placeholder="Contact Person" style="text-transform: capitalize;" required>
                        <input type="text" class="form-control mb-1 shadow" name="relationship" placeholder="Relationship" style="text-transform: capitalize;" required>
                        <input type="text" class="form-control mb-1 shadow" name="e_address" placeholder="Address" required>
                        <input type="text" class="form-control mb-1 shadow" name="e_contact" placeholder="Contact No">
                        <span class="input-group-btn" style="float: right !important;">
                        
                        <center>
                        <input type="submit" value="ADD" class="mt-2 btn text-center" style="background-color: #faad26; font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>

<!-- edit modal -->
@foreach($agents as $agent)
<div class="modal fade" id="editModal{{$agent->agent_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><b>Employee Information</b></h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('agents.update',$agent->agent_id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}                
                    <div class="form-group">
                        @if($agent->status==1)
                        <a type="button" style="background:none;border:none; color:#faad26;text-decoration: none;" href="{{route('agents.updatestatus',$agent->agent_id)}}"><b>Active</b></a><br>
                        @else
                        <a type="button" style="background:none;border:none; color:red;text-decoration: none;" href="{{route('agents.updatestatus',$agent->agent_id)}}"><b>Inactive</b></a><br>
                        @endif
                        <input type="text" class="form-control mb-1 shadow mt-2" name="status_info" placeholder="status if inactive">
                        <input type="text" class="form-control mb-1 shadow mt-2"name="bio_no" value="{{$agent->bio_no}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="emp_no" value="{{$agent->emp_no}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="name" value="{{$agent->name}}"required>

                        <input type="text" class="form-control mb-1 shadow" name="address" value="{{$agent->address}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="contact_no" value="{{$agent->contact_no}}"required>
                        <select class="form-select form-control  mb-1 shadow" name="account_name" value="{{$agent->account_name}}"required>
                            <option value="{{$agent->account_id}}" selected>{{$agent->account_name}}</option>
                        @foreach($allaccounts as $account)
                            <option value="{{$account->id}}">{{$account->account_name}}</option>
                            @endforeach
                        </select>
                        <select class="form-select form-control  mb-1 shadow" name="contract_name"required>
                            <option value="{{$agent->contract_id}}" selected>{{$agent->contract_name}}</option>
                            @foreach($allcontracts as $contract)
                            <option value="{{$contract->id}}">{{$contract->contract_name}}</option>
                            @endforeach
                        </select>
                        <label class="mt-1">Date Of Birth:<br>
                        <input type="date" class="form-control mb-1 shadow" name="date_of_birth" value="{{$agent->date_of_birth}}"required>
                        </label>
                        <label class="mt-1 ml-2">Date Hired:<br>
                        <input type="date" class="form-control mb-1 shadow" name="date_hired" value="{{$agent->date_hired}}"required>
                        </label>
                        <br>

                    <!-- Benefit -->
                        <h6 class="modal-title mt-1"><b>Benefit:</b></h6>
                        <input type="text" class="form-control mb-1 shadow mt-1" name="tin" value="{{$agent->tin}}">
                        <input type="text" class="form-control mb-1 shadow" name="sss" value="{{$agent->sss}}">
                        <input type="text" class="form-control mb-1 shadow" name="philhealth" value="{{$agent->philhealth}}">
                        <input type="text" class="form-control mb-1 shadow" name="pag_ibig" value="{{$agent->pag_ibig}}">

                    <!-- Emergency -->
                        <h6 class="modal-title mt-1"><b>Person in case of Emergency:</b></h6>
                        <input type="text" class="form-control mb-1 shadow mt-1" name="c_person" style="text-transform: capitalize;" value="{{$agent->c_person}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="relationship" style="text-transform: capitalize;" value="{{$agent->relationship}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="e_address" value="{{$agent->e_address}}"required>
                        <input type="text" class="form-control mb-1 shadow" name="e_contact" value="{{$agent->e_contact}}"required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="Update" class="mt-2 btn text-center" style="background-color: #faad26; font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>
@endforeach

<!-- Delete Modal -->
@foreach($agents as $agent)
    <div class="modal fade" id="deleteModal{{$agent->agent_id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="{{route('agents.destroy',$agent->agent_id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <div class="form-group">
                        <p>Are you sure you want to delete <b>{{$agent->name}}</b>?</p>
                    <span class="input-group-btn" style="float: right !important;">
                    <center>
                        <input type="submit" value="DELETE" class="mt-2 btn btn-danger text-center" style="font-weight: bold;">
                    </center> 
                    </div> 
                </form>
        </div>
        
        </div>
    </div>
    </div>
@endforeach

    <div class="mt-3 p-2 bg-white" style="border-top: 5px solid; border-color: black;">
    <h4>Employee</h4>
        <table class="table" id="agenttable" style="width: 100%;">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th>Bio #</th>
                    <th>Employee Number</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Account</th>
                    <th>Status</th>
                    <th>Contract Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($agents as $agent)
                <tr  id="table">
                    <td style="display:none">{{$agent->id}}</td>
                    <td>{{$agent->bio_no}}</td>
                    <td>{{$agent->emp_no}}</td>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->address}}</td>
                    <td>{{$agent->contact_no}}</td>
                    <td>{{$agent->account_name}}</td>
                    @if($agent->status==1) 
                    <td><a style="background:none;border:none; color:#faad26;text-decoration: none;"><b>Active</b></a></td>
                    @else
                    <td><a style="background:none;border:none; color:red;text-decoration: none;"><b>Inactive</b></a> ( {{$agent->status_info}} )</td>
                    @endif 
                    <td>{{$agent->contract_name}}</td>
                    <td>
                        <a  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$agent->agent_id}}">Edit</a>
                        <a  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$agent->agent_id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@stop
@section('script')

<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{asset('https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js')}}"></script>

<script type="text/javascript" src="{{asset('https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#agenttable').DataTable( {

        } );
    } );
</script>
@endsection
