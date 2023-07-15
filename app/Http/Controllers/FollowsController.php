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
        ->where('follower', Auth::id())
        ->pluck('follow');

        $followIcons = DB::table('users')
        ->whereIn('id',$follows)
        ->select('id','images')
        ->get();

        $followPosts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->whereIn('posts.user_id', $follows)
        //->orWhere('posts.user_id',Auth::id())→自分のつぶやきまで表示されてしまうため不要。
        ->select('users.id','users.username','users.images','posts.posts','posts.created_at as created_at')
        ->get();
        //dd($followPosts);
        return view('follows.followList',['follows'=>$follows, 'followPosts'=>$followPosts,'followIcons'=>$followIcons]);
    }

    public function followerList()
    {
        $followers = DB::table('follows')
        ->where('follow', Auth::id())
        ->pluck('follower');

        $followerIcons = DB::table('users')
        ->whereIn('id',$followers)
        ->select('id','images')
        ->get();

        $followerPosts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->whereIn('posts.user_id', $followers)
        ->select('users.id','users.username','users.images','posts.posts','posts.created_at as created_at')
        ->get();

        return view('follows.followerList',['followers'=>$followers, 'followerIcons'=>$followerIcons, 'followerPosts'=>$followerPosts]);
    }

    public function follow(Request $request)
    {
        $follow = $request->input('follow');
        DB::table('follows')->insert([
            'follow' => $follow,
            'follower' => Auth::id(),
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        $delete = $request->input('delete');
        DB::table('follows')
            ->where('follower', Auth::id())
            ->where('follow', $delete)
            ->delete();

        return back();
    }
}
