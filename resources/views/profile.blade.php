@extends('layout/master')

@section('content')

@include("layout.profile_header");

@include("layout.profile_content");

<form method="POST" action='{{url("change_profile_picture")}}' enctype="multipart/form-data" class="change_profile_picture" style="display:none">
	{{csrf_field()}}
	<input type="file" name="avatar"></input>
	<input type="submit" name="submit" value="Submit" class="btn"></input>
</form>


@endsection