@extends('layouts.login')

@section('content')
<h1>Follow List</h1>
<div>

@foreach($followIcons as $followIcon)
<img src="images/{{$followIcon->images}}">
@endforeach

<div>
  @foreach($followPosts as $followPost)
  <a href="">
    <img src="images/{{ $followPost->images }}" alt="">
  </a>
  <td>{{ $followPost->username }}</td>
  <td>{{ $followPost->posts }}</td>
  @endforeach
</div>

</div>

@endsection
