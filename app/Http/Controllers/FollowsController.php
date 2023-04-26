<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        $follows = DB::table('follows')
        ->join('users','follows.follow','=','users.id')
        ->where('follower', Auth::id())
        ->get();
        $followPosts = DB::table('follows')
        ->join('posts','follows.follow','=','posts.user_id')
        ->where('follower', Auth::id())
        ->get('posts');
        //dd($followPosts);
        return view('follows.followList',['follows'=>$follows, 'followPosts'=>$followPosts]);
    }

    public function followerList(){
        return view('follows.followerList');
    }
}
