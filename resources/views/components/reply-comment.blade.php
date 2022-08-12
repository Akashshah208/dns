<!-- ================================ -->
<!-- Reply Comments -->
<!-- ================================ -->

<div class="modal fade" id="reply_comment" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mb-3" action="{{ route('replyComment') }}" method="POST">
                    @csrf
                    <input type="text" name="blog_id" value="{{ $blog_id }}">
                    <input type="text" name="parent_id" value="{{ $comment_id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment_id }}">
                    <div class="mb-3">
                        <label for="discaut" class="form-label opacity-75">Select Author <span
                                class="text-danger">*</span></label>
                        <select class="form-select" name="auth" required>
                            <option value="0" disabled>Select Blog Author</option>
                            @forelse($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @empty
                                <option disabled> No Data Found</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea2"
                               class="opacity-75 form-label">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="5"
                                  placeholder="Write message here" name="comment" required></textarea>
                    </div>

                    <div class="mt-4">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard
                        </button>
                        <button class="btn btn-primary" type="submit">Post Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ================================ -->
<!-- Reply Comments -->
<!-- ================================ -->
