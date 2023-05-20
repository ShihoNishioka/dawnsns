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
        $posts = DB::table('posts')->get();

        return view('posts.index',['posts'=>$posts]);
    }

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
}
