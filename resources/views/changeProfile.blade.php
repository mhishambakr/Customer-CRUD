@extends('layout.app')


@section('content')

<div class="container mt-2">
    <div class="jumbotron text-center d-flex flex-column justify-content-end align-items-center">

<form method='post' action='{{url("customers/updateProfile",$customer->id)}}' enctype="multipart/form-data">
@csrf
    <div class="custom-file">
        <label for="image" class='custom-file-label text-left'>Choose image</label>
        <input type='file' name='image' id="image" class="custom-file-input" value="{{$customer->image}}"><br>
    </div>
    <input type='submit' value='update' class='btn btn-info btn-xs btn-block'><br>

    
</form>

    </div>
</div>
@endsection