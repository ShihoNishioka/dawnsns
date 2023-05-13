@extends('layouts.login')

@section('content')
<h1>Follow List</h1>
<div>

@foreach($followIcons as $followIcon)
<a href="/profile/{{ $followIcon->id }}">
  <img src="images/{{$followIcon->images}}">
</a>
@endforeach

<div>
  @foreach($followPosts as $followPost)
  <a href="/profile/{{ $followPost->id }}">
    <img src="images/{{ $followPost->images }}" alt="">
  </a>
  <td>{{ $followPost->username }}</td>
  <td>{{ $followPost->posts }}</td>
  @endforeach
</div>

</div>

@endsection
