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
    public function profile(){
        return view('users.profile');
    }
}
