@extends('layouts.login')

@section('content')
<div>
  <table>
  <img src="{{asset('storage/images/'. $myProfile->images)}}">
  <form action="/my-profile" method="post" enctype="multipart/form-data">
    @csrf
    <div class="myProfile">
      <input type="hidden" name="username" value="{{ $myProfile->id }}">

    <label for="username">User Name</label>
      <input type="text" name="username" value="{{ $myProfile->username }}">
    </div>
    <div class="myProfile">
      <label for="mail">Mail Address</label>
      <input type="text" name="mail" value="{{ $myProfile->mail }}">
    </div>
    <div class="myProfile">
      <label for="password">Password</label>
      <input type="password" name="password" value="{{ $myProfile->password }}" disabled>
    </div>
    <div class="myProfile">
      <label for="new password">new Password</label>
      <input type="password" name="new password" value="">
    </div>
    <div class="myProfile">
      <label for="bio">Bio</label>
      <textarea name="bio" id="bio" cols="30" rows="10">{{ $myProfile->bio }}</textarea>
    </div>
    <div class="myProfile">
      <label for="Icon Image">Icon Image</label>
      <input type="file" name="icon" accept="image/jpeg, image/png">
    </div>
    @if($errors->any())
    <div>
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <input type="submit" name="upload" value="更新">
  </form>
  </table>
</div>
@endsection
