@extends('layout/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-3">
			@include('layout.timeline_nav')
		</div>
		<div class="col-xs-12 col-md-9">
			 @foreach($suggested_interests as $suggested_interest)
                <!-- if there are suggested interests display results -->
                @if(count($suggested_interests) > 1)
                    @if(Auth::user()->id != $suggested_interest->id && !$interests->contains($suggested_interest->id))
                        <div class="row">
                            <div class="col-xs-12">
                                <a href='{{url("user/$suggested_interest->id")}}'>
                                    <span><img src='{{$suggested_interest->avatar}}'></span>
                                    {{$suggested_interest->name}}
                                </a>
                                
                            </div>
                        </div>
                    @endif
                <!-- if none display message -->
                @else
                    <p>No suggested interests at this time</p>
                @endif
            @endforeach
		</div>
	</div>
@endsection