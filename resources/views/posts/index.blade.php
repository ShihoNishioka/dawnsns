@extends('layouts.login')

@section('content')
<form action="/post" method="post">
  @csrf
  <textarea name="post" id="" cols="30" rows="3" placeholder="つぶやいた内容を表示します。"></textarea>
  <input type="image" src="/images/post.png" alt="送信">
</form>

  </div>
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
