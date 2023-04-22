@extends('layouts.login')

@section('content')

<form action="/search" method="post">
  @csrf
  <input type="text" name="search_users" placeholder="ユーザー名">
  <input type="submit" name="search" value="検索">
</form>

@if(isset($keyword))
<p>検索ワード：{{ $keyword }}</p>
@endif

@if($users->isEmpty())
<p>当てはまるユーザーがいません</p>
@else
<table>
@foreach ($users as $user)

<tr>
  <td>
    <img src="images/{{ $user->images }}" alt="">
  </td>
  <td>{{ $user->username }}</td>
</tr>
@endforeach
</table>
@endif
@endsection
