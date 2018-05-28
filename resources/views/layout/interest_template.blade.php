<div class="col-sm-4">
	<div class="interest_container">
		<div class="interest_header">
			<div class="interest_avatar">
				<a href='{{url("$interest->id")}}'><img src="/{{$interest->avatar}}"></a>
			</div>
			<div class="interest_info">
				<a href='{{url("$interest->id")}}'>{{$interest->name}}</a>
				<p>{{$interest->bio}}</p>
			</div>
		</div>
		<div class="interest_content">
			<p>Interested in</p>
			<p>{{$interest->interest}}</p>
		</div>
		<div class="interest_options">
			@if($auth->id != $interest->id && $auth->getInterests->contains($interest->id))
			<form method="POST" action='{{url("cancelRequest/$interest->id")}}' class="remove_interest" data-id="{{$interest->id}}">
			{{csrf_field()}}
				<button><i class="fas fa-times"></i></button>
			</form>
			@elseif($auth->id != $interest->id && !$auth->getInterests->contains($interest->id))
			<form method="POST" action='{{url("add-to-interests/".$interest->id."")}}'></form>
			<i class="fas fa-plus"></i>
			@elseif(Auth::user()->id == $interest->id)
			@endif
		</div>
	</div>
</div>