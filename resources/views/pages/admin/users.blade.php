@extends('layout.master')
@section('title')
    Staffs
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">



@stop
@section('script')


@stop

@section('content')
<!-- Button trigger modal -->
<button class="btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:12px;width:80px;height:35px; color:black; background-color:#faad26;">
<b>Add Staff</b>
</button>
{!! Toastr::message() !!}
<!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form id="adduser" action="{{route('staffs.store')}}" method="post">
                    @csrf                        
                    <div class="form-group">
                        <input type="text" class="form-control mb-1 shadow" name="fname" placeholder="Enter First name" style="text-transform: capitalize;" required>
                        <input type="text" class="form-control mb-1 shadow" name="lname" placeholder="Enter Last name" style="text-transform: capitalize;"  required>
                        <input type="text" class="form-control mb-1 shadow" name="username" placeholder="Enter Username" required> 
                        <p class="mt-2"><b>Note!</b> The default passsword is Username.</p>
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



<!-- Edit Modal -->
@foreach($staffs as $staff)
    <div class="modal fade" id="editModal{{$staff->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$staff->fname}} {{$staff->lname}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="{{route('staffs.update',$staff->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control mb-1 shadow" name="fname" style="text-transform: capitalize;"  value="{{$staff->fname}}" required>
                        <label>Last Name:</label>
                        <input type="text" class="form-control mb-1 shadow" name="lname" style="text-transform: capitalize;" value="{{$staff->lname}}" required>
                        <label>Username:</label>
                        <input type="text" class="form-control mb-1 shadow" name="username" value="{{$staff->users->username}}" required> 
                    <span class="input-group-btn" style="float: right !important;">
                    <center>
                        <input type="submit" value="Update" class="mt-2 btn text-center" style="color:black; background-color:#faad26; font-weight: bold;">
                    </center> 
                    </div> 
                </form>
        </div>
        
        </div>
    </div>
    </div>
@endforeach

<!-- delete modal -->
@foreach($staffs as $staff)
    <div class="modal fade" id="deleteModal{{$staff->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="{{route('staffs.destroy',$staff->id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <div class="form-group">
                        <p>Are you sure you want to delete <b>{{$staff->fname}}, {{$staff->lname}} </b>?</p>
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

<!-- staff update password -->

@foreach($staffs as $staff)
<div class="modal fade" id="resetModal{{$staff->users->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$staff->fname}} {{$staff->lname}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
            </div>
        <div class="modal-body">
                <form action="{{route('staffs.updatepassword',$staff->users->id)}}" method=POST
                        oninput='confirmpass.setCustomValidity(confirmpass.value != newpass.value ? "New Passwords does not match." : "")'>
                        @csrf
                    {{method_field('GET')}}
                    <p>
                    <label for="oldpass">Old Password:</label>
                    <input type="password" class="form-control mb-1 shadow " name="oldpass" id="oldpass" required>
                           
                    <p>
                    <label for="password1">Password:</label>
                    <input id="newpass" class="form-control mb-1 shadow" type=password required name=newpass>
                    
                    <p>
                    <label for="password2">Confirm password:</label>
                    <input id="confirmpass" class="form-control mb-1 shadow" type=password name=confirmpass>
                    <p>
                    <input type=submit value="Update" class="mt-2 btn btn-primary text-center" style="font-weight: bold;">
                </form>
        </div>
        
        </div>
    </div>
</div>
    @endforeach


    <div class="mt-3 p-2 bg-white" style="border-top: 5px solid; border-color: black;">
    <h5>Staffs</h5>
        <table class="table" id="agenttable" style="width: 100%;">
            <thead>
                <tr>
                    <th style="display:none">ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td style="display:none">{{$staff->id}}</td>
                    <td style="text-transform: capitalize;">{{$staff->fname}}</td>
                    <td style="text-transform: capitalize;">{{$staff->lname}}</td>
                    <td>{{$staff->users->username}}</td>
                    <td>
                        <button href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$staff->id}}">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$staff->id}}">Delete</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resetModal{{$staff->users->id}}">Change Password</button>
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

