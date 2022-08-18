
@extends('layout.master')
@section('content')
{!! Toastr::message() !!}

    <div class="container mt-5 mb-1 shadow" style="width: 20rem; height: 20rem;">
                <form action="{{route('change_password.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data" 
                oninput='confirmpass.setCustomValidity(confirmpass.value != newpass.value ? "Passwords do not match." : "")'>
                    @csrf
                    {{method_field('GET')}}
                    <p>
                    <label for="oldpass" class="mt-2">Old Password:</label>
                    <input type="password" class="form-control mb-1 shadow " name="oldpass" id="oldpass" required>
                    <p>
                    <label for="password1">Password:</label>
                    <input id="newpass" class="form-control mb-1 shadow" type=password required name=newpass>
                    
                    <p>
                    <label for="password2">Confirm password:</label>
                    <input id="confirmpass" class="form-control mb-1 shadow" type=password name=confirmpass>
                    <p>
                    <input type=submit value="Change Password" class="mt-2 btn btn-primary text-center" style="font-weight: bold; float:right;">
                </form>     
    </div>

@endsection
