<div class="profile_content">
	<div class="row">
		<div class="col-md-4 col-lg-3 side_nav">
			@include("layout.sidebar_about")
		</div><!-- col -->
		<div class="col-xs-12 col-md-8 col-lg-6 posts_container">
			@if($user->id == Auth::user()->id)
			<div class="post_form">
				<form method="POST" action='{{url("new_post")}}' enctype="multipart/form-data" class="row">
					{{csrf_field()}}
					<div class="col-xs-10 col-sm-10">
						<div class="form-group">
							<input type="text" id='post' name="post" placeholder="" class="form-control"></input>
						</div>
					</div>
					<div class="col-xs-2 col-sm-2 button">
						<div class="form-group">
							<input type="submit" id='addpost' name="addpost" value="Post" class="btn btn-sm" onclick="addPost()"></input>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							 <span class="add_photobutton"><i class="fas fa-camera"></i></span>
							<input type="file" id='img' name="img" class="addphoto" style="display: none"></input>
						</div>
					</div>	
				</form>
			</div>
			@endif
			@if(count($user->getPosts()) == 0)
				<div class="post_container">
					@if($user->id == Auth::user()->id)
						<p>You haven't posted anything yet</p>
					@else
						<p>{{$user->name}} hasn't posted anything yet</p>
					@endif
				</div>
			@else
				@foreach($user->getPosts() as $post)
					@include('layout.post_template')
				@endforeach
			@endif
		</div>
		<div class="col-lg-3 ifWideScreen">
			<div class="quick_view_container movable_div">
				<div class="quick_header">
					<a href=""><p>Photos</p></a>
				</div>
				<div class="quick_content quick_content_photos">
					@foreach($user->getPhotos() as $photo)
						<div class="thumb_container">
							<a href="{{url('post/'.$photo->id.'')}}"><img src="/{{$photo->picture}}"></a>
						</div>		
					@endforeach				
				</div>
				<div class="quick_footer">
					<a href='{{url("".$user->id."/photos")}}'>View all</a>
				</div>
			</div>
		</div>
	</div><!-- row -->
</div>
