@extends('layout.app')


@section('content')

<div class="container mt-2">
    <div class="text-center d-flex flex-column justify-content-end align-items-center border border-info rounded-lg">
        <form action='{{url("customers/search")}}' method="post" class='form-group'>
        @csrf

            
            <div class="form-group row">
                <label for="name" class='col-form-label'>First Name</label>
                <input type='text' name='name' class='form-control' id='name'><br>
            </div>
            <input type="submit" value="Search" class='btn btn-info btn-xs btn-block'>
        </form>
    </div>
</div>
@endsection