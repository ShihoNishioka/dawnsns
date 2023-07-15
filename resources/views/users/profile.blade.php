@extends('layouts.login')

@section('content')
<div>
  <div class="profiles">
    <table>
    <img class="icons" src="/images/{{ $profile->images }}">
    <tr>
      <td>Name</td>
      <td>{{ $profile->username }}</td>
    </tr>
    <tr>
      <td>Bio</td>
      <td>{{ $profile->bio }}</td>
    </tr>
  </table>
  </div>
  @if($btn->contains($profile->id))
    <form action="/delete" method="post">
        @csrf
        <input type="hidden" name="delete" value="{{ $profile->id }}">
      <button class="unfollow-btn" >フォローをはずす</button>
    </form>
    @else
    <form action="/follow" method="post">
    @csrf
      <input type="hidden" name="follow" value="{{ $profile->id }}">
      <button class="follow-btn" >フォローをする</button>
    </form>
  @endif
  <hr>
  <div class="profile-posts">
  @foreach($posts as $post)
    <table>
      <tr>
        <td><img class="icons" src="/images/{{ $profile->images }}"></td>
        <td class="posts">{{ $post->posts }}</td>
        <td class="time">{{ $post->created_at }}</td>
      </tr>
    </table>
    <hr>
  @endforeach
  </div>

</div>


@endsection
