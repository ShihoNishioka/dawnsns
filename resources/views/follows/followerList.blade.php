@extends('layouts.login')

@section('content')
<h1>Follower List</h1>
<div>

@foreach($followerIcons as $followerIcon)
<a href="/profile/{{ $followerIcon->id }}">
  <img src="images/{{$followerIcon->images}}">
</a>
@endforeach

<div>
  @foreach($followerPosts as $followerPost)
  <a href="/profile/{{ $followerPost->id }}">
    <img src="images/{{ $followerPost->images }}" alt="">
  </a>
  <td>{{ $followerPost->username }}</td>
  <td>{{ $followerPost->posts }}</td>
  @endforeach
</div>

</div>

@endsection
