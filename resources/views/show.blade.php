@extends('layout.app')

@section('content')
<div class="container mt-2">
    <div class="jumbotron text-center d-flex flex-column justify-content-end align-items-center">

        
@if(isset($customer->id))
    
    <div class="btn-group">
        <a class="btn btn btn-outline-info" href="{{url('/customers/edit',$customer->id)}}",>Edit</a>
        <a class="btn btn btn-outline-info" href="{{url('/customers/delete',$customer->id)}}">Delete</a>
        <a class="btn btn btn-outline-info" href="{{url('/customers/changeProfile',$customer->id)}}">Change Profile</a>
    </div>
    
    <img src="{{asset('asset/images/customers'.'/'.$customer->image)}}" class='img-fluid'>
    <h2>{{$customer->first_name}} {{$customer->last_name}}</h2>
    <p>{{$customer->email}}</p>
    <p>{{$customer->phone_number}}</p>
    <p>{{$customer->site_url}}</p>
    
@else
    <h1>User not found</h1>
@endif



    </div>
</div>
@endsection