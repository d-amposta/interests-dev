@extends('layout/master')

@section('content')

@include("layout.profile_header")

	<div class="row edit-profile-container">
		<div class="col-xs-12 col-md-3">
			<div class="side_option_nav">
				<div class="side_option_header">
					<p>Profile Settings</p>
				</div>
				<nav>
					<ul>
						<li><a href="">Edit Profile</a></li>
						<li><a href='{{url("".Auth::user()->id."/account-settings")}}'>Account Settings</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="col-xs-12 col-md-9">
			<div class="form-wrapper">
				<div class="form-header">
					<h4>Edit Profile</h4>
				</div>
				<form method="POST" action="" class="form-horizontal">
				{{csrf_field()}}
					<div class="col-md-12 col-lg-6">
						<div class="form-group">
							<label class="col-md-2 control-label">Name</label>
							<div class="col-md-10">
								<input type="text" name="name" value='{{$user->name}}' class="form-control"></input>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-10">
								<input type="text" name="email" value='{{$user->email}}' class="col-md-4 form-control"></input>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Birthday</label>
							<div class="col-md-10">
								<input type="date" name="birthday" value='{{$user->birthday}}' class="form-control"></input>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Location</label>
							<div class="col-md-10">
								<input type="text" name="location" value="" class="form-control">
							</div>
						</div>	
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="form-group">
							<label class="col-md-2 control-label">Bio</label>
							<div class="col-md-10">
								<textarea name="bio" rows="3" class="form-control" required>{{$user->bio}}</textarea>	
							</div>	
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Interests</label>
							<div class="col-md-10">
								<textarea name="interest" rows="4" class="form-control" required>{{$user->interest}}</textarea>	
							</div>	
						</div>
					</div>
					<input type="submit" name="edit_account" value="Save Changes" class="btn"></input>
				</form>
			</div>
		</div>
	</div>
@endsection