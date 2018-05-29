@extends('layout/master')

@section('content')

@include('layout.profile_header')

<div class="row">
	<div class="col-xs-12 col-md-3">
		@include('layout.sidebar_about')
	</div>
	<div class="col-xs-12 col-md-9">
		<div class="photos_container">
			@if(count($user->getPhotos()) > 0)
				@foreach($user->getPhotos() as $photo)
					<a href='{{url("post/".$photo->id."")}}'><img src="/{{$photo->picture}}"></a>
				@endforeach
			@else
				@if($user->id == Auth::user()->id)
					<p>You haven't posted any photos yet</p>
				@else
					<p>{{$user->name}} hasn't posted any photos yet</p>
				@endif
			@endif
		</div>
	</div>
</div>

@endsection