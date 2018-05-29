@extends('layout.master')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<div class="post_container">
			    <div class="post_header">
			        <div class="post_header_left">
			            <a href='{{url("$post->user_id")}}'><img src='/{{$post->user->avatar}}'></a>
			        </div>
			        <div class="post_header_content">
			            <a href='{{url("$post->user_id")}}'>{{$post->user->name}}</a>
			            <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>    
			        </div>
			        <span class="glyphicon glyphicon-option-horizontal option_toggle"></span>
			        <div class="post_header_options" data-postId="{{$post->id}}">
			            @if($post->user_id == Auth::user()->id)
			            <a href='{{url("edit/post/".$post->id."")}}' class="btn-link"><span class="option_icon"><i class="fas fa-pencil-alt"></i></span>Edit this post</a>
			            <button class="btn-link" data-toggle="modal" data-target="#post{{$post->id}}"><span class="option_icon"><i class="fas fa-trash-alt"></i></span>Delete this post</button>
			            @else
			            <button class="btn-link"><span class="option_icon"><i class="fas fa-times"></i></span>Remove from Interests</button>
			            @endif
			        </div>
			    </div>
			    <div class="post_content">
			        <p>{{$post->post}}</p>
			        @if(!empty($post->picture))
			            <img src='/{{$post->picture}}'>
			        @endif
			    </div>
			    <div class="replies_container">
			    	<div class="reply_form">
			    		<form method="POST" action='{{url("add_reply/$post->id")}}'>
                            <div class="row">
                                {{csrf_field()}}
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <input type="text" id='reply{{$post->id}}' name="reply" class="form-control"></input>   
                                    </div>
                                </div>
                                <div class="col-xs-2 button">
                                    <input type="button" id='replybutton{{$post->id}}' name="submit" value="Post Reply" class="btn btn-sm" onclick="addReply({{$post->id}})"></input>
                                </div>
                            </div>
                        </form>
			    	</div>
			    	<div class="reply_content">
			    		<p>Replies ({{count($post->replies)}})</p>
			    		@if($post->replies)
                            @foreach($post->replies as $reply)
                            <div class="reply_content">
                                <div class="reply_avatar">
                                    <img src="/{{$reply->user->avatar}}">
                                </div>
                                <div class="reply_content">
                                    <p class="reply_auth">{{$reply->user->name}}</p>
                                    <p>{{$reply->reply}}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
			    	</div>
			    </div>
			</div>
		</div>
	</div>
@endsection