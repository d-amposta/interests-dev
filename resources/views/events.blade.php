@extends('layout/master');

@section('content')
<div class="row">
	<div class="col-xs-12 col-md-3">
		@include('layout.timeline_nav')
	</div>
	<div class="col-xs-12 col-md-9">
		@foreach(Auth::user()->getInterests as $birthday)
			<p>{{$birthday}}</p>
		@endforeach
	</div>
</div>
@endsection