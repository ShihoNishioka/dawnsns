@extends('layouts.login')

@section('content')

  <div class=''>
    <table class=''>
      <tr>
        <th>User</th>
        <th>Posts</th>
      </tr>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $post->user_id }}</td>
        <td>{{ $post->posts }}</td>
      </tr>
      @endforeach
    </table>
  </div>

@endsection
