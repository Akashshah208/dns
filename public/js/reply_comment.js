function ReplyComment(url, blog_id, comment_id, reply_id) {
    $.ajax({
        method: "post",
        url: url,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            blog_id: blog_id,
            comment_id: comment_id,
            reply_id: reply_id,
        },
        success: function (result) {
            $('#reply_comment_popup').html(result);
            $('#reply_comment').modal('show');
        },
        error: function (error) {
            console.log('here1')
            console.log(error);
        }
    });
}

function ReplyCommentOnUser(url, blog_id, comment_id, reply_id, user) {
    $.ajax({
        method: "post",
        url: url,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            blog_id: blog_id,
            comment_id: comment_id,
            reply_id: reply_id,
            user: user,
        },
        success: function (result) {
            $('#reply_comment_popup_user').html(result);
            $('#reply_comment_user').modal('show');
        },
        error: function (error) {
            console.log('here1')
            console.log(error);
        }
    });
}


