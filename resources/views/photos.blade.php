@extends('layout/master')

@section('content')

@include('layout.profile_header')

<div class="row">
	<div class="col-xs-12 col-md-3">
		@include('layout.sidebar_about')
	</div>
	<div class="col-xs-12 col-md-9">
		<div class="photos_container">
			@foreach($user->getPhotos() as $photo)
				<img src="/{{$photo->picture}}">
			@endforeach
		</div>
	</div>
</div>

@endsection