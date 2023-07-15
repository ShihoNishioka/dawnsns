@extends('layouts.login')

@section('content')
<h1 class="lists">Follow List</h1>
<div class="lists-icons">
@foreach($followIcons as $followIcon)
  <a href="/profile/{{ $followIcon->id }}">
    <img class="icons" src="images/{{$followIcon->images}}">
  </a>
@endforeach
</div>
<hr>
<div class="lists-posts">
  @foreach($followPosts as $followPost)
  <div>
    <a href="/profile/{{ $followPost->id }}">
      <img class="icons" src="images/{{ $followPost->images }}" alt="">
    </a>
    <p>{{ $followPost->username }}</p>
    <p>{{ $followPost->posts }}</p>
    <p>{{ $followPost->created_at }}</p>
  </div>
  <hr>
  @endforeach
</div>



@endsection
