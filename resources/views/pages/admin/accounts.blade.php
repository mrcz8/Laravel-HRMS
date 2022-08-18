@extends('layout.master')
@section('title')
    Account & Contract
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@stop

@section('content')
{!! Toastr::message() !!}
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('accounts.store')}}" method="post">
                    @csrf                        
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="account_name" placeholder="Enter Account Name" required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="ADD" class="mt-1 btn text-center" style="color:black; background-color:#faad26; font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>

<!-- Contract Modal -->
    <div class="modal fade" id="contractmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Contract</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('contracts.addcontracts')}}" method="post">
                    @csrf                        
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="contract_name" placeholder="Enter Contract Name" required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="ADD" class="mt-1 btn text-center" style="color:black; background-color:#faad26; font-weight: bold; ">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>


    <!-- edit modal -->
    @foreach($accounts as $account)
    <div class="modal fade" id="editModal{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('accounts.update',$account->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}                    
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="account_name" value="{{$account->account_name}}"required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="Update" class="mt-1 btn text-center" style="color:black; background-color:#faad26; font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach

    <!-- Contract Edit -->
    @foreach($contracts as $contract)
    <div class="modal fade" id="editcontractModal{{$contract->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Contract</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('contracts.updatecontracts',$contract->id)}}" method="GET">
                    @csrf
                    {{method_field('GET')}}                    
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="contract_name" value="{{$contract->contract_name}}"required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="Update" class="mt-1 btn text-center" style="color:black; background-color:#faad26; font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach

    <!-- delete modal -->
    
    @foreach($accounts as $account)

    <div class="modal fade" id="deleteModal{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('accounts.destroy',$account->id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}                    
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="account_name" value="{{$account->account_name}}"required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="Delete" class="mt-1 btn btn-danger text-center" style="font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach

<!-- Contracts Delete -->
    @foreach($contracts as $contract)
    <div class="modal fade" id="deletecontractModal{{$contract->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Contracts</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('contract.deletedestroy',$contract->id)}}" method="GET">
                    @csrf
                    {{method_field('DELETE')}}                    
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="contract_name" value="{{$contract->contract_name}}"required>
                        <span class="input-group-btn" style="float: right !important;">
                        <center>
                        <input type="submit" value="Delete" class="mt-1 btn btn-danger text-center" style="font-weight: bold;">
                        </center> 
                    </div>
                </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach

    <!-- Account -->
    
<div class="row p-2">
        <div class="col-6 mt-1 "style="border-top: 5px solid; border-color:#faad26;">
        <h4 class="mt-2">Account</h4>
        <button class="btn mt-2" data-bs-toggle="modal" data-bs-target="#addModal" style="font-size:15px;width:118px;height:40px; color:black; background-color:#faad26;">
        <b>Add Account</b>
        </button>
            <table class="table table-bordered">
                <table class="table" id="accounttable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Account Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                    <tr  id="table">
                        <td>{{$account->id}}</td>
                        <td>{{$account->account_name}}</td>
                        <td>
                            <a  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$account->id}}">Edit</a>
                            <a  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$account->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
      


<!-- Contract -->
        <div class="col-6 mt-1 " style="border-top: 5px solid; border-color: black;">
            <h4 class="mt-2 ml-1">Contract</h4>
            <button class="btn mt-2 ml-1 margin-right: 150%;" data-bs-toggle="modal" data-bs-target="#contractmodal" style="font-size:15px;width:125px;height:40px; color:white; background-color:black">
            <b>Add Contract</b>
            </button>
            <table class="table table-bordered">
                <table class="table" id="contracttable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contract Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                    <tr  id="table">
                        <td>{{$contract->id}}</td>
                        <td>{{$contract->contract_name}}</td>
                        <td>
                            <a  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcontractModal{{$contract->id}}">Edit</a>
                            <a  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletecontractModal{{$contract->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            
            </table>
        </div>
        
    </div>
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
        $('#accounttable').DataTable( {

        } );
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#contracttable').DataTable( {

        } );
    } );
</script>
@endsection

