@extends('layouts.login')

@section('content')
<h1 class="lists">Follower List</h1>
<div class="lists-icons">
@foreach($followerIcons as $followerIcon)
  <a href="/profile/{{ $followerIcon->id }}">
    <img class="icons" src="images/{{$followerIcon->images}}">
  </a>
@endforeach
</div>
<hr>
<div class="lists-posts">
  @foreach($followerPosts as $followerPost)
  <div>
    <a href="/profile/{{ $followerPost->id }}">
    <img class="icons" src="images/{{ $followerPost->images }}" alt="">
    </a>
    <p>{{ $followerPost->username }}</p>
    <p>{{ $followerPost->posts }}</p>
    <p>{{ $followerPost->created_at }}</p>
  </div>
  <hr>
  @endforeach
</div>

@endsection
