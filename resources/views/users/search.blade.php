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
  @if($btn->contains($user->id))
  <td>
    <form action="/delete" method="post">
      @csrf
      <input type="hidden" name="delete" value="{{ $user->id }}">
    <button>フォローをはずす</button>
    </form>
  </td>
  @else
  <td>
    <form action="/follow" method="post">
      @csrf
      <input type="hidden" name="follow" value="{{ $user->id }}">
      <button>フォローをする</button>
    </form>
  </td>
  @endif
</tr>
@endforeach
</table>
@endif
@endsection
