@extends('layouts.login')

@section('content')
<form class="index-posts" action="/post" method="post">
  @csrf
  <textarea name="post" id="" cols="50" rows="5" placeholder="つぶやいた内容を表示します。"></textarea>
  <input type="image" src="/images/post.png" alt="送信">
</form>
  <hr>
  <div class='top-posts'>
    <table class='posts-all'>
      <tr>
        <th></th>
        <th class="headline">User</th>
        <th class="headline">Posts</th>
        <th>  </th>
      </tr>
      @foreach ($posts->unique('id') as $post)
      <tr>
        <td><img class="icons" src="/images/{{ $post->images }}" alt=""></td>
        <td class="posts-users">{{ $post->username }}</td>
        <td class="posts">{!! nl2br($post->posts) !!}</td>
        <td class="posts-time">{{ $post->created_at }}</td>
        @if(Auth::id() === $post->user_id)
        <td class="edit">
          <img src="/images/edit.png" alt="" class="modal-open" data-target="post-modal{{ $post->id }}">
          <form action="post-delete" method="post">
            @csrf
            <input type="hidden" name="delete" value="{{ $post->id }}">
            <input type="image" src="/images/trash_h.png" alt="削除" class="delete-btn">
          </form>
        </td>
        @endif
        <td>
        <section id="post-modal{{ $post->id }}" class="updateModal">
          <div>
            <form action="post-update" method="post" class="postModal">
              @csrf
              <textarea name="post-update" id="" cols="30" rows="3" class="post-update">{{ $post->posts }}</textarea>
              <input type="hidden" name="update" value="{{ $post->id }}">
              <input type="image" src="/images/edit.png" alt="編集" class="edit-btn">
              <a class="modalClose">×</a>
            </form>
          </div>
          </section>
          </td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
