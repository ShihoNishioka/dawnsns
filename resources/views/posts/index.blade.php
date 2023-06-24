@extends('layouts.login')

@section('content')
<form action="/post" method="post">
  @csrf
  <textarea name="post" id="" cols="30" rows="3" placeholder="つぶやいた内容を表示します。"></textarea>
  <input type="image" src="/images/post.png" alt="送信">
</form>
  <div class='top-posts'>
    <table class='posts-all'>
      <tr>
        <th>User</th>
        <th>Posts</th>
        <th>  </th>
      </tr>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $post->user_id }}</td>
        <td>{{ $post->posts }}</td>
        <td>
          <img src="/images/edit.png" alt="" class="modal-open" data-target="post-modal{{ $post->id }}">
          <form action="post-delete" method="post">
            @csrf
            <input type="hidden" name="delete" value="{{ $post->id }}">
            <input type="image" src="/images/trash_h.png" alt="削除">
          </form>
        </td>
        <td>
        <section id="post-modal{{ $post->id }}" class="updateModal">
          <div>
            <form action="post-update" method="post" class="postModal">
              @csrf
              <textarea name="post-update" id="" cols="30" rows="3" class="post-update">{{ $post->posts }}</textarea>
              <input type="hidden" name="update" value="{{ $post->id }}">
              <input type="image" src="/images/edit.png" alt="編集" class="edit-btn">
            </form>
          </div>
          </section>
          </td>
      </tr>
      @endforeach
    </table>
  </div>

@endsection
