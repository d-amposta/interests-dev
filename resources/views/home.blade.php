@extends('layout/master')

@section('content')
<div class="feed">
    <div class="row">
        <div class="col-md-4 col-lg-3 side_nav">
            @include('layout.timeline_nav')
        </div>

        <!-- posts -->
        <div class="col-md-8 col-lg-6 site_content">
            <div class="newsfeed-form">
                <form method="POST" action='{{url("new_post")}}' enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
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
                    </div>
                    <div class="row">
                       <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <input type="file" id='img' name="img" class="addphoto input" style="display: none"></input>
                                <p class="file-name"></p>
                                <label for="img" class="add_photobutton"><span class="upload_icon"><i class="fas fa-camera"></i></span><span class="upload_text">Upload a photo</span></label>
                            </div>
                        </div> 
                    </div>  
                </form>
            </div>
            @foreach($posts as $post)
                @if(Auth::user()->getInterests->contains($post->user->id) || $post->user_id == Auth::user()->id) <!-- if a user likes someone -->
                    @include('layout.post_template')
                @endif
            @endforeach
            
        </div><!-- col -->
        
        <!-- suggested interests -->
        <div class="col-lg-3 ifWideScreen">
            <div class="quick_view_container today_container movable_div" data-count="{{count($birthdays)}}">
                <div class="quick_header">
                    <p>Birthdays</p>
                </div>
                <div class="quick_content">
                    <!-- <p>Birthdays</p> -->
                    <ul>
                        @if(count($birthdays) > 0)
                            @foreach($birthdays as $birthday)
                            <div class="row">
                                <div class="col-xs-12">
                                   <div class="post_header_left">
                                        <a href='{{url("user/$birthday->id")}}'><img src='{{$birthday->avatar}}'></a>
                                    </div>
                                    <div class="post_header_content">
                                        <a href='{{url("user/$birthday->id")}}'>{{$birthday->name}}</a>
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                         @else
                        <li>No one is celebrating their birthday today</li>
                        @endif
                    </ul>
                    <!-- <p>Events</p>
                    <ul>
                        <li>No events at this time</li>
                    </ul> -->
                </div>
            </div>
            <div class="quick_view_container movable_div">
                <div class="quick_header">
                    <p>Suggested Interests</p>
                </div>
                <div class="quick_content">
                    <!-- if there are suggested interests display results -->
                    @if(count($suggested_interests) > 1)
                        @foreach($suggested_interests as $suggested_interest)
                            @if(Auth::user()->id != $suggested_interest->id && !$interests->contains($suggested_interest->id))
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="post_header_left">
                                            <a href='{{url("user/$suggested_interest->id")}}'><img src='{{$suggested_interest->avatar}}'></a>
                                        </div>
                                        <div class="post_header_content">
                                            <a href='{{url("$suggested_interest->id")}}'>{{$suggested_interest->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <a href="{{url(''.Auth::user()->id.'/suggested-interests')}}" class="content_link">View all</a>
                    <!-- if none display message -->
                    @else
                        <p>No suggested interests at this time</p>
                    @endif   
                </div>    
            </div>
        </div><!-- col --> 
    </div><!-- row -->    
</div>

@endsection
