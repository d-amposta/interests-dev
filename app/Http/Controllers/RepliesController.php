<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Reply;

class RepliesController extends Controller
{
   /*function addReply(Request $request, $id) {
   	$new_reply= new Reply();
   	$new_reply->reply= $request->reply;
   	$new_reply->post_id = $id;
   	$new_reply->user_id = Auth::user()->id;
   	$new_reply->save();

   	return back();
   }*/

   public function showReply($id, Request $request) {
      $post = POST::find($id);

      $post->addReply(request('reply'));

      return back();


   }

   function editReply($id, Request $request) {
   	$reply_te = Reply::find($id);
   	$reply_te->reply = $request->editreply;
   	$reply_te->save();

   	return back();
   }

   function deleteReply($id) {
   	$reply_td = Reply::find($id);
   	$reply_td->delete();

   	return back();
   }
}
