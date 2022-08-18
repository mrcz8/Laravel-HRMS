@extends('layout.master')
@section('title')
    Active Account
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@stop

@section('content')
<!-- Button trigger modal -->

{!! Toastr::message() !!}
<!-- Modal -->
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
                    <th>Date Hired</th>
                </tr>
            </thead>
            <tbody>
            @foreach($active as $agent)
                <tr  id="table">
                    <td style="display:none">{{$agent->id}}</td>
                    <td>{{$agent->bio_no}}</td>
                    <td>{{$agent->emp_no}}</td>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->address}}</td>
                    <td>{{$agent->contact_no}}</td>
                    <td>{{$agent->account_name}}</td>
                    @if($agent->status==1) 
                    <td><a type="button" style="background:none;border:none; color:#faad26;text-decoration: none;"><b>Active</b></a></td>
                    @else
                    <td><a type="button" style="background:none;border:none; color:red;text-decoration: none;"><b>Inactive</b></a></td>
                    @endif 
                    <td>{{$agent->date_hired}}</td>
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
