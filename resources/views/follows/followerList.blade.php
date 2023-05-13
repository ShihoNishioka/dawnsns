@extends('layouts.login')

@section('content')
<h1>Follower List</h1>
<div>

@foreach($followerIcons as $followerIcon)
<img src="images/{{$followerIcon->images}}">
@endforeach

<div>
  @foreach($followerPosts as $followerPost)
  <a href="">
    <img src="images/{{ $followerPost->images }}" alt="">
  </a>
  <td>{{ $followerPost->username }}</td>
  <td>{{ $followerPost->posts }}</td>
  @endforeach
</div>

</div>

@endsection
