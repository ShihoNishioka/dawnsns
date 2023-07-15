<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');


//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
Route::get('/test','PostsController@test')->middleware('auth');
Route::post('/post','PostsController@create')->middleware('auth');
Route::post('/post-update', 'PostsController@update')->middleware('auth');
Route::post('/post-delete', 'PostsController@delete')->middleware('auth');


Route::get('/my-profile','UsersController@myProfile')->middleware('auth');
Route::post('/my-profile','UsersController@profileUpdate')->middleware('auth');
// Route::post('/my-profile','UsersController@store')->middleware('auth');

/**他のユーザーのページ */
Route::get('/profile/{id}','UsersController@profile')->middleware('auth');

Route::get('/search','UsersController@index')->middleware('auth');
Route::post('/search','UsersController@result')->middleware('auth');
Route::post('/follow', 'FollowsController@follow')->middleware('auth');
Route::post('/delete', 'FollowsController@delete')->middleware('auth');

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');
