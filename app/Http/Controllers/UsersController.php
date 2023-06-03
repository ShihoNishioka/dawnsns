<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function profileUpdate(Request $request)
    {
        // 更新したデータを受け取る
        $username = $request->input('username');
        $mail = $request->input('mail');
        $newPassword = $request->input('new password');
        $bio = $request->input('bio');
        $icon = $request->file('icon');
        //dd($icon);

        //  update処理をする
        DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'username'=>$username,
            'mail'=>$mail,
            'bio'=>$bio
            ]);
            //issetを使うことによって、パスワードの更新がある場合は下記処理をする。ない場合は何もしない。という処理。
        if(isset($newPassword)){
            DB::table('users')
                ->where('id', Auth::id())
                ->update([
                'password'=>bcrypt($newPassword)
                ]);
            };
            //画像の更新がある場合は、画像についている名前を取って来て、それをDBに更新し、storeもしくはstoreAsで保存する。という処理。
        if(isset($icon)){
            $iconName = $request->file('icon')->getClientOriginalName();
            //dd($iconName);
            DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'images'=>$iconName
            ]);
            $icon->storeAs('public/images', $iconName);
        };
        return back();
    }

    public function store(Request $request)
    {
            $request->validate([
                'username' => ['between:4,12'],
                'mail' => ['between:4,50', 'unique:users'],
                //「アドレスに変更がなければ再登録可能にする」？
                'new password' => ['alpha_num', 'between:4,12', 'unique:users'],
                'bio' => ['string', 'max:200'],
                'icon' => ['image', 'mimes:jpg,png,bmp,gif,svg'],
                //「ファイル名が英数字のみ」？
            ],
            [
                'username.between' => '4文字以上12文字以内で入力してください',
                'mail.unique' => '既に登録されているメールアドレスです',
                'new password.alpha' => '英数字しか使えません',
                'new password.between' => '4文字以上12文字以内で入力してください',
                'icon' => '',
            ]);
            return back();
        }
}
