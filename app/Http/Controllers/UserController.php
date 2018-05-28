<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class UserController extends Controller
{
	function viewProfile($id) {
		$user = User::find($id);

		return view('user', compact('user'));
	}

	function viewInterests($id) {
		$auth = Auth::user();
		$user = User::find($id);

		return view('interests', compact('auth', 'user'));
	}

	function viewFollowers($id) {
		$auth = Auth::user();
		$user = User::find($id);

		return view('followers', compact('auth', 'user'));
	}

	function editUser($id) {
		$id=Auth::user()->id;
		$user=Auth::user();
		$interests=$user->userRequests;
		$followers=$user->theirRequests;
		$posts = Post::where('user_id', $id)->latest()->get();
		$photos = Post::where('user_id', $id)->whereNotNull('picture')->get();

		return view('edit_profile', compact('user', 'interests', 
			'followers', 'posts', 'photos'));
	}

	function saveEditUser($id, Request $request) {
		$id=Auth::user()->id;
		$user_tbe=User::find($id);
		$user_tbe->name = $request->name;
		$user_tbe->email = $request->email;
		$user_tbe->bio = $request->bio;
		$user_tbe->interest = $request->interest;
		$user_tbe->birthday = $request->birthday;
		$user_tbe->save();

		return redirect()->route('user', [$user_tbe]);
	}

	function viewAccountSettings($id) {
		$id=Auth::user()->id;
		$user=Auth::user();
		$interests=$user->userRequests;
		$followers=$user->theirRequests;
		$posts = Post::where('user_id', $id)->latest()->get();
		$photos = Post::where('user_id', $id)->whereNotNull('picture')->get();

		return view('account-settings', compact('user', 'interests', 
			'followers', 'posts', 'photos'));
	}

	function deleteUser() {
		
		$user_tbd=User::find($id);
		$user_tbd->delete();

		return redirect('/delete_profile_confirm');
	}

	function updateAvatar(Request $request) {
		$id=Auth::user()->id;
		$user_tbe=User::find($id);
		if(empty($request->avatar)) {

        }
        else {
            $image = $request->avatar;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/'.Auth::user()->id , $filename);
            $user_tbe->avatar = 'uploads/'.Auth::user()->id.'/'.$filename;
        }
		$user_tbe->save();

		return back();
	}

	function updateCoverPhoto(Request $request) {
		$id=Auth::user()->id;
		$user_tbe=User::find($id);
		if(empty($request->cover_photo)) {

        }
        else {
            $image = $request->cover_photo;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/'.Auth::user()->id , $filename);
            $user_tbe->cover_photo = 'uploads/'.Auth::user()->id.'/'.$filename;
        }
		$user_tbe->save();

		return back();
	}

	public function viewEvents() {
		$user = Auth::user()->id;

		return view('events', compact('user'));
	}
	
}
