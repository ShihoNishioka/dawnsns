@extends('layouts.login')

@section('content')
<h1>Follow List</h1>
<div>
  @foreach($follows as $follow)
  <a href="">
    <img src="images/{{ $follow->images }}" alt="">
  </a>
  @endforeach
</div>

@endsection
