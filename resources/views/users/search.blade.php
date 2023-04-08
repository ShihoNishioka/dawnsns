@extends('layouts.login')

@section('content')
<form action="/search" method="get">
  <input type="text" name="search" placeholder="ユーザー名">
  <input type="submit" value="検索">
</form>

<table>
@foreach ($users as $user)
<tr>
  <td>
    <img src="images/{{ $user->images }}" alt="">
  </td>
  <td>{{ $user->username}}</td>
</tr>
@endforeach
</table>
@endsection
