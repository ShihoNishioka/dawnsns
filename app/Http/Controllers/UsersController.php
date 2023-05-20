<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Auth::idは認証済みユーザー（現在ログインしているユーザーのid）
    public function index()
    {
        $users = DB::table('users')->get();
         $btn = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');
        return view('users.search',['users'=>$users, 'btn'=>$btn]);
    }
//'users.search'は「usersフォルダ内のsearch.blade」の意味
    public function result(Request $request)
    {
        $keyword = $request->input('search_users');
            //isset($_POST["search"])) {
            //$sql="SELECT * FROM users WHERE username LIKE '%{$user->username}%'";
            //$stmt = $pdo->prepare($sql);
            //$stmt->execute();
            $users = DB::table('users')
            ->where('username', 'like', '%'.$keyword.'%')
            ->get();
            //dd($users);
            $btn = DB::table('follows')
            ->where('follower', Auth::id())
            ->pluck('follow');

        return view('users.search',['users'=>$users,'keyword'=>$keyword, 'btn'=>$btn]);
    }

    public function profile($id)
    {
        $profile = DB::table('users')
        ->where('id',$id)
        ->first();
        // dd($profile);
        $btn = DB::table('follows')
        ->where('follower', Auth::id())
        ->pluck('follow');

        $posts = DB::table('posts')
        ->where('user_id',$id)
        ->get();

        return view('users.profile',['profile'=>$profile, 'btn'=>$btn, 'posts'=>$posts]);
    }

    public function myProfile()
    {
        $id = Auth::id();
        $myProfile = DB::table('users')
        ->where('id', $id)
        ->first();
        //dd($myProfile);

        return view('users.myProfile',['id'=>$id, 'myProfile'=>$myProfile]);
    }

    public function profileUpload()
    {
        return redirect('/profile');
    }
}
