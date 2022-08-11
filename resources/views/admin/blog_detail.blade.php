@extends('layout.admin_app')
<section class="py-5 mt-8">
    <div class="container-fluid max-width-base">
        <div class="d-md-flex d-block align-items-center justify-content-between">
            <h4 class="fw-bold mb-md-0 mb-3">Blog Detail</h4>
            <div>
                <a href="{{ route('admin.blogDelete', $blog->id) }}" type="button" class="btn btn-danger">Delete
                    Blog</a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editblog">Edit
                    Blog
                </button>
            </div>
        </div>
    </div>
</section>
@section('content')
    <div class="row">
        <div class="col-lg-8">

            <h2 class="mb-2">
                {{ $blog->title }}
            </h2>

            <div class="mb-4">
                @forelse($tags as $tag)
                    <a href="javascript:void(0)" class="bg-dark text-white badge">
                        {{ $tag->name }}
                    </a>
                @empty
                    <a href="javascript:void(0)" class="bg-dark text-white badge">
                        No Tags
                    </a>
                @endforelse
            </div>


            <span class="text-secondary d-block mb-4">By <a href="https://ethenex.com/" target="_blank"
                                                            class="me-1">{{ $blog->author ? $blog->author->name : 'Unknown Author'}}</a>
                        {{ date_format($blog->created_at, "M d, Y") }}
                    </span>

            <div class="mb-5">
                <div class="card overflow-hidden border-0 shadow overflow-hidden">
                    <img
                        src='{{$blog->banner ? asset('uploadFile/blogBanner/'.$blog->banner) : asset('dist/images/user/user2.jpg')}}'
                        class="zoom-in card-img-top" alt="">
                </div>
            </div>

            @php
                echo("$blog->description");
            @endphp

            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body">
                    <h3 class="mb-4">Author</h3>
                    <div class="d-flex align-items-start">
                        <div class="me-3 ps-2">
                            <img
                                src='{{$blog->author->profile ? asset('uploadFile/author/'.$blog->author->profile) : asset('dist/images/user/user2.jpg')}}'
                                class="rounded-circle border" height="70" width="70"
                                alt="">
                        </div>

                        <div>
                            <h5 class="mb-0">{{ $blog->author->name }}</h5>
                            <span class="fs-3">{{ $blog->author->work }}</span>
                            <p class="mt-3 text-dark opacity-50 mb-0">
                                {{ $blog->author->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-4">Comments</h3>

            @forelse($blog->comments as $comment)
                <div class="d-md-flex d-block align-items-start mb-5 pb-5 border-bottom">
                    <div class="me-3">
                        {{--                            <img src="{{asset('dist/images/owners/deep.jpg')}}" height="50"--}}
                        <img src="{{ Avatar::create($comment->name)->toBase64() }}" height="50" width="50"
                             class="mb-3 mb-md-0 rounded-circle"
                             alt="">
                    </div>

                    <div>
                        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                            <h6 class="fs-5 mb-0">{{ $comment->name }}</h6> <span
                                class="ms-md-3 fs-14 opacity-50 ms-0">{{ date_format($comment->created_at, "M d, Y") }}</span>
                        </div>
                        <p class="opacity-50">{{ $comment->email }}</p>
                        <p class="mb-3">
                            {{ $comment->comment }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#replymodal"
                               class="reply-btn link-primary" data-id={{ $comment->id }}><i
                                    class='fas fa-reply me-2'></i>Reply</a>
                            <a href="{{ route('admin.commentDelete', $comment->id) }}" type="button"
                               class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                    class='fas fa-trash-alt me-2'></i>Delete</a>
                        </div>

                        <!--  -->

                        @forelse($comment->replies as $reply)
                            <div class="d-md-flex d-block align-items-start mt-5">
                                <div class="me-3">
                                    <img src="{{ Avatar::create($reply->name)->toBase64() }}" height="50" width="50"
                                         class="mb-3 mb-md-0 rounded-circle" alt="">
                                </div>

                                <div>
                                    <div class="d-md-flex d-block align-items-center justify-content-between mb-0">
                                        <h6 class="fs-5 mb-0">{{ $reply->name }}</h6> <span
                                            class="ms-md-3 fs-14 opacity-50 ms-0">{{ date_format($reply->created_at, "M d, Y") }}</span>
                                    </div>
                                    <p class="opacity-50">{{ $reply->email }}</p>
                                    <p class="mb-3">
                                        {{ $reply->comment }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#replymodal"
                                           class="reply-btn link-primary"><i class='fas fa-reply me-2'
                                                                             data-id={{ $reply->id }}></i>Reply</a>
                                        <a href="{{ route('admin.commentDelete', $reply->id) }}" type="button"
                                           class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                                class='fas fa-trash-alt me-2'></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="d-md-flex d-block align-items-start mb-5 pb-5 border-bottom">
                                <p>No Comment Reply</p>
                            </div>
                        @endforelse


                    </div>
                </div>

                <!-- ================================ -->
                <!-- Reply Comments -->
                <!-- ================================ -->

                <div class="modal fade" id="replymodal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
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

            @empty
                <div class="d-md-flex d-block align-items-start mb-5 pb-5 border-bottom">
                    <p>No Comment</p>
                </div>
            @endforelse

        </div>

        <div class="col-lg-4">
            <h3 class="mb-4">Category</h3>

            <div class="mb-5">
                @forelse($allTags as $allTag)
                    <a href="javascript:void(0)" class="bg-dark text-white badge">
                        {{ $allTag->name }}
                    </a>
                @empty
                    <a href="javascript:void(0)" class="bg-dark text-white badge">
                        No Tags
                    </a>
                @endforelse
            </div>

            {{--<h3 class="mb-4">Related Articles</h3>

            <div class="card shadow-sm border-0 overflow-hidden">
                <a href="./blog-details.html">
                    <div class="overflow-hidden">
                        <img src="../dist/images/blog/2.jpg" class="zoom-in img-fluid" alt="">
                    </div>
                </a>
                <div class="card-body">
                    <h5 class="mb-3">
                        <a href="./blog-details.html" class="dark-link">
                            MX Lookup - How to Find a Domain's online MX Records
                        </a>
                    </h5>
                    <span class="text-secondary">By <a href="https://ethenex.com/" target="_blank"
                                                       class="me-1">Akash Shah</a>
                        On
                        July 20, 2022
                    </span>
                </div>
            </div>

            <div class="card bg-transparent shadow-sm border-0 overflow-hidden w-100">
                <a href="./blog-details.html">
                    <div class="overflow-hidden">
                        <img src="../dist/images/blog/3.jpg" class="zoom-in img-fluid" alt="">
                    </div>
                </a>
                <div class="card-body">
                    <h5 class="mb-3">
                        <a href="./blog-details.html" class="dark-link">
                            Guide to SSL: What It is & Why It Makes Your Website More Secure
                        </a>
                    </h5>
                    <span class="text-secondary">By <a href="https://ethenex.com/" target="_blank"
                                                       class="me-1">Parth Goshwami</a>
                        On
                        July 14, 2022
                    </span>
                </div>
            </div>

            <div class="card bg-transparent shadow-sm border-0 overflow-hidden w-100">
                <a href="./blog-details.html">
                    <div class="overflow-hidden">
                        <img src="../dist/images/blog/4.jpg" class="zoom-in img-fluid" alt="">
                    </div>
                </a>
                <div class="card-body">
                    <h5 class="mb-3">
                        <a href="./blog-details.html" class="dark-link">
                            TXT Lookup - Free online tool to DNS Text (TXT) records for a domain
                        </a>
                    </h5>
                    <span class="text-secondary">By <a href="https://ethenex.com/" target="_blank"
                                                       class="me-1">Anna Dicosta</a>
                        On
                        July 09, 2022
                    </span>
                </div>
            </div>--}}
        </div>
    </div>
@stop

