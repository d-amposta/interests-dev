<div class="profile_header">
	<div class="profile_cover">
		<img src="{{$user->cover_photo}}">
	</div>
	<div class="profile_nav">
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="profile_author">
					<div class="author_thumb">
						<img id='avatar' src='/{{$user->avatar}}'>	
					</div>
					<div class="author_content">
						<p>{{$user->name}}</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-9 col-lg-6">
				<ul>
					<li><a href='{{url("$user->id")}}'>
						<span class="profilenav_label">Posts</span>
						<span class="profilenav_value">{{count($user->getPosts())}}</span>
					</a></li>
					<li><a href='{{url("$user->id/interests")}}'>
						<span class="profilenav_label">Interests</span>
						<span class="profilenav_value">{{count($user->getInterests)}}</span>
					</a></li>
					<li><a href='{{url("$user->id/followers/")}}'>
						<span class="profilenav_label">Followers</span>
						<span class="profilenav_value">{{count($user->getFollowers)}}</span>
					</a></li>
					<li><a href="">
						<span class="profilenav_label">Photos</span>
						<span class="profilenav_value">{{count($user->getPhotos())}}</span>
					</a></li>
				</ul>
			</div>
		</div>
		<div class="profile_options">
			@if($user->id == Auth::user()->id)
			<div class="profile_button"><i class="fas fa-ellipsis-v"></i></div>
			<div class="options_container">
				<ul>
					<li><a href="{{url('edit-profile/profile-picture')}}">Update Profile Photo</a></li>
					<li><a href="">Update Cover Photo</a></li>
					<li><a href='{{url("$user->id/edit-profile")}}'>Edit Profile</a></li>
					<li><a href="{{url('edit_profile')}}">Account Settings</a></li>
				</ul>
			</div>
			@elseif(Auth::user()->id != $user->id && !$user->getFollowers->contains(Auth::user()->id))
			<div class="profile_button"><i class="fas fa-plus"></i></div>
			@elseif(Auth::user()->id != $user->id && $user->getFollowers->contains(Auth::user()->id))
			<div class="profile_button"><i class="fas fa-ellipsis-v"></i></div>
			<div class="options_container">
				<ul>
					<li><a href="">Remove from Interests</a></li>
				</ul>
			</div>
			@endif
		</div>
	</div>
</div>