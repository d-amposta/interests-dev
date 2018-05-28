<div class="modal fade" tabindex="-1" role="dialog" id="updateAvatar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="profile_modal_header">
      		<p>Update Avatar</p>
      	</div>
      	<div class="profile_modal_content">
      		<form method="POST" action='{{url("".Auth::user()->id."/edit/avatar")}}' enctype="multipart/form-data">
	            {{csrf_field()}}
	            <button><input type="file" name="avatar"></button>
	            <input type="submit" name='change_avatar' value="Change Avatar" class="btn">
	        </form>	
      	</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="updateCoverPhoto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action='{{url("".Auth::user()->id."/edit/cover-photo")}}' enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" name="cover_photo">
            <input type="submit" name='change_cover_photo' value="Change Cover Photo" class="btn">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="viewAvatar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<img src="{{$user->avatar}}">
      </div>
    </div>
  </div>
</div>

<div class="profile_header">
	<div class="profile_cover">
		@if(!empty($user->cover_photo))
		<img src="/{{$user->cover_photo}}">
		@endif
	</div>
	<div class="profile_nav">
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="profile_author">
					<div class="author_thumb">
						<a href="#viewAvatar" data-toggle="modal"><img id='avatar' src='/{{$user->avatar}}'></a>	
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
					<li><a href="#updateAvatar" data-toggle="modal">Update Avatar</a></li>
					<li><a href="#updateCoverPhoto" data-toggle="modal">Update Cover Photo</a></li>
					<li><a href='{{url("$user->id/edit/profile")}}'>Edit Profile</a></li>
					<li><a href='{{url("$user->id/account-settings")}}'>Account Settings</a></li>
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