@extends('layouts.login')

@section('content')
<?php
if (isset($_POST["search"])) {
  $sql="SELECT * FROM users WHERE username LIKE '%{$user->username}%'";
  $stmt = $pdo->prepare($sql);

  $stmt->execute();
  foreach($stmt as $row){
    echo $row['username'];
  }
}
?>

<form action="/search" method="post">
  <input type="text" name="search_users" placeholder="ユーザー名">
  <input type="submit" name="search" value="検索">
</form>

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
@endsection
