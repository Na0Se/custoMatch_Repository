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

$('.like').click(function (item) {
  item.preventDefault();
  currentUserIndex++;
  checkUserNum();
  var elem = document.querySelector('.like');
  var to_user_id = elem.dataset.user_id;
  postReaction(to_user_id, 'like')
});

function checkUserNum() {
    // ユーザー数といいねした回数が同じになればaddClassする
    if (currentUserIndex === usersNum) {
      $(".like").addClass("is-none")
      return;
    }
  }