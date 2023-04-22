<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.search',['users'=>$users]);
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
    // dd($users);
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

    public function profile(){
        return view('users.profile');
    }



}
