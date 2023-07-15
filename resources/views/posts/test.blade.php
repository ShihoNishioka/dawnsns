@extends('layouts.login')

@section('content')
<div class='top-posts'>
    <table class='posts-all'>
      <tr>
        <th></th>
        <th class="headline">User</th>
        <th class="headline">Posts</th>
        <th>  </th>
      </tr>
      @foreach ($testPosts as $testPost)
      <tr>
        <td><img class="icons" src="/images/{{ $testPost->images }}" alt=""></td>
        <td class="posts-users">{{ $testPost->username }}</td>
        <td class="posts">{!! nl2br($testPost->posts) !!}</td>
        <td class="posts-time">{{ $testPost->created_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>

@endsection
