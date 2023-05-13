@extends('layouts.login')

@section('content')
<div>
  <table>
  <img src="/images/{{ $profile->images }}">
    <td>Name</td>
    <td>{{ $profile->username }}</td>
    <td>Bio</td>
    <td>{{ $profile->bio }}</td>
  </table>
  @if($btn->contains($profile->id))
  <td>
    <form action="/delete" method="post">
      @csrf
      <input type="hidden" name="delete" value="{{ $profile->id }}">
    <button>フォローをはずす</button>
    </form>
  </td>
  @else
  <td>
    <form action="/follow" method="post">
      @csrf
      <input type="hidden" name="follow" value="{{ $profile->id }}">
      <button>フォローをする</button>
    </form>
  </td>
  @endif

  <div>
    @foreach($posts as $post)
    <table>
    <tr>
        <img src="/images/{{ $profile->images }}">
        <td>{{ $post->posts }}</td>
      </tr>
    </table>
    @endforeach
  </div>

</div>


@endsection
