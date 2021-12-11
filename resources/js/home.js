var currentUserIndex = 0;
var postReaction = function (to_user_id, reaction) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
  });
  $.ajax({
    type: "POST",
    url: "/api/like",
    data: {
      to_user_id: to_user_id,
      from_user_id: from_user_id,
      reaction: reaction,
    },
    success: function (j_data) {
      console.log("success")
    }
  });
}
$("#card-user").home({
  onLike: function (item) {
    currentUserIndex++;
    checkUserNum();
    var to_user_id = item[0].dataset.user_id
    postReaction(to_user_id, 'like')
  },
  animationRevertSpeed: 200,
  animationSpeed: 400,
  threshold: 1,
  likeSelector: '.like',
});

$('.actions .like, .actions .dislike').click(function (e) {
  e.preventDefault();
  $("#card-user").home($(this).attr('class'));
});
