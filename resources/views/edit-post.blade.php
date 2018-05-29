@extends('layout.master')

@section('content')

<div class="modal fade" tabindex="-1" role="dialog" id="post{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Are you sure you want to delete this post?</p>
        <p>{{$post->post}}</p>
        <form method="POST" action='{{url("delete/post/".$post->id."")}}'>
            {{csrf_field()}}
            <input type="submit" name='delete_post' value="Yes">
            <button>No</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="post_container">
                <div class="post_header">
                    <div class="post_header_left">
                        <a href='{{url("user/$post->user_id")}}'><img src='/{{$post->user->avatar}}'></a>
                    </div>
                    <div class="post_header_content">
                        <a href='{{url("user/$post->user_id")}}'>{{$post->user->name}}</a>
                        <p class="timestamp">{{$post->created_at->diffForHumans()}}</p>    
                    </div>
                </div>
                <div class="post_content">
                    <form method="POST" action='{{url("edit/post/".$post->id."")}}'>
                        {{csrf_field()}}
                        <input type="text" name="post" value="{{$post->post}}" placeholder="Write a caption..." class="form-control">
                    @if(!empty($post->picture))
                        <img src='/{{$post->picture}}'>
                    @endif
                    <button data-toggle="modal" data-target="#post{{$post->id}}">delete</button>
                    <input type="submit" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection