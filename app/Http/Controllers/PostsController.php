<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        $follows = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','posts.user_id','=','follows.follower')
            ->whereIn('posts.user_id', $follows)
            ->orWhere('posts.user_id',Auth::id())
            ->select('posts.id', 'posts.user_id', 'users.username','users.images','posts.posts','posts.created_at as created_at')
            ->get();
       // dd($posts);

        return view('posts.index',['posts'=>$posts]);
    }

    public function update(Request $request)
    {
        $post = $request->input('post-update');
        $update = $request->input('update');
        DB::table('posts')
        ->where('id', $update)
        ->update(['posts' => $post]);

        return back();
    }

    public function delete(Request $request)
    {
        $delete = $request->input('delete');
        DB::table('posts')
        ->where('id', $delete)
        ->delete();

        return back();
//        dd($delete);
    }

    //新しいつぶやきの入力フォームの設定
    public function create(Request $request)
    {
        $post = $request->input('post');
        //'post'= index.blade内、<textarea name="post"…>の「post」に入力されたものをリクエスト
        $id = Auth::id();
        //現在認証されているユーザーのID取得
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => $id,
        ]);
        return redirect('/top');
    }

    public function test()
    {
       $testPosts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->select('users.id','users.username','users.images','posts.posts','posts.created_at as created_at')
            ->where('user_id', Auth::id())
            ->get();
        return view('posts.test',['testPosts'=>$testPosts]);
    }
}
