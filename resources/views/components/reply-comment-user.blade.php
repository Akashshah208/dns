<!-- ================================ -->
<!-- Reply Comments -->
<!-- ================================ -->

<div class="modal fade" id="reply_comment_user" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-5" action="{{ route('replyComment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog_id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment_id }}">
                    <input type="hidden" name="reply_id" value="{{ $reply_id }}">
                    <input type="hidden" name="user" value="{{ $user }}">

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="opacity-75 form-label">Name <span
                                class="text-danger">*</span></label>
                        <input type="name" class="form-control" id="exampleFormControlInput2"
                               placeholder="Enter your name here" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="opacity-75 form-label">Email <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="Enter your email here" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="opacity-75 form-label">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                  placeholder="Write message here" name="comment" required></textarea>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary" type="submit">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ================================ -->
<!-- Reply Comments -->
<!-- ================================ -->
