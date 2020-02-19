@extends('layout.app')


@section('content')

<div class="container mt-2">
    <div class="text-center d-flex flex-column justify-content-end align-items-center border border-info rounded-lg">

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show w-50 p-3" >
            {{$error}}
            @if($error == 'The password format is invalid.')
                {!!'<br>The password contains characters from at least three of the following five categories:<br>- English uppercase characters (A – Z)<br>
                - English lowercase characters (a – z)<br>
                - Base 10 digits (0 – 9)'!!}
            @endif
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

    <form method='post' action='{{url("/customers/add")}}' enctype="multipart/form-data" class='form-group'>
    @csrf
        <div class="form-group row">
            <label for="first_name" class='col-form-label'>First Name</label>
            <input type='text' name='first_name' class='form-control' id='first_name' value='{{old("first_name")}}'><br>
        </div>
        <div class="form-group row">
            <label for="last_name" class='col-form-label'>Last Name</label>
            <input type='text' name='last_name' class='form-control' id='last_name' value='{{old("last_name")}}'><br>
        </div>
        <div class="form-group row">
            <label for="email" class='col-form-label'>Email</label>
            <input type='email' name='email' class='form-control' id='email' value='{{old("email")}}'><br>
        </div>
        <div class="form-group row">
            <label for="password" class='col-form-label'>Password</label>
            <input type='password' name='password' class='form-control' id='password' value='{{old("password")}}' title='English uppercase characters (A – Z)
            English lowercase characters (a – z)
            Base 10 digits (0 – 9)' pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$'><br>
        </div>
        <div class="form-group row">
            <label for="phone_number" class='col-form-label'>Phone Number</label>
            <input type='text' name='phone_number' class='form-control' id='phone_number' value='{{old("phone_number")}}'><br>
        </div>
        <div class="form-group row">
            <label for="site_url" class='col-form-label'>Site URL</label>
            <input type='text' name='site_url' class='form-control' id='site_url' value='{{old("site_url")}}'><br>
        </div>
        <div class="custom-file">
            <label for="image" class='custom-file-label text-left'>Choose image</label>
            <input type='file' name='image' class='form-control' id="image" class="custom-file-input" value='{{old("image")}}'><br>
        </div>
        <input type='submit' value='Add' class='btn btn-info btn-xs btn-block'><br>
    </form>

    </div>
</div>
@endsection