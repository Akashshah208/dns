function ReplyComment(url, blog_id, comment_id) {
    console.log('here')
    $.ajax({
        method: "post",
        url: url,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            blog_id: blog_id,
            comment_id: comment_id,
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

