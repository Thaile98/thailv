@extends('layouts.admin_app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
   
    <div class="row">
       <a href="{{url('/admin/create/ticket')}}" class="btn btn-success">Create Ticket</a>
       <a href="{{url('/admin/tickets')}}" class="btn btn-default">All Tickets</a>
    </div>
</div>
@endsection