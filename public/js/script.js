$(function () { //①
  $('.modal-open').each(function () {
    $(this).on('click', function () {
      //data-target="post-modal{{ $post-id }}"を取得し、
      var target = $(this).data('target');
      //class="updateModal"の{{ $post->id }}を表示させる指示
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.postModal').fadeOut();
    return false;
  });
});
