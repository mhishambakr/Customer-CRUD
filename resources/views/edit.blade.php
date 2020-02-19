@extends('layout.app')


@section('content')

<div class="container mt-2">
    <div class="text-center d-flex flex-column justify-content-end align-items-center border border-info rounded-lg">

    <form method='post' action='{{url("customers/update",$customer->id)}}' class='form-group'>
    @csrf
        <div class="form-group row">
            <label for="first_name" class='col-form-label'>First Name</label>
            <input type='text' class='form-control' id='first_name' name='first_name' value="{{$customer->first_name}}"><br>
        </div>
        <div class="form-group row">
            <label for="last_name" class='col-form-label'>Last Name</label>
            <input type='text' class='form-control' id='last_name' name='last_name' value="{{$customer->last_name}}"><br>
        </div>
        <div class="form-group row">
            <label for="email" class='col-form-label'>Email</label>
            <input type='text' class='form-control' id='email' disabled name='email' value="{{$customer->email}}"><br>
        </div>
        <div class="form-group row">
            <label for="password" class='col-form-label'>Password</label>
            <input type='text' class='form-control' id='password' name='password' value="{{$customer->password}}"><br>
        </div>
        <div class="form-group row">
            <label for="phone_number" class='col-form-label'>Phone Number</label>
            <input type='text' class='form-control' id='phone_number' name='phone_number' value="{{$customer->phone_number}}"><br>
        </div>
        <div class="form-group row">
            <label for="site_url" class='col-form-label'>Site URL</label>
            <input type='text' class='form-control' id='site_url' name='site_url' value="{{$customer->site_url}}"><br>
        </div>
        <input type='submit' value='Update' class='btn btn-info btn-xs btn-block'><br>
    </form>

    </div>
</div>
@endsection