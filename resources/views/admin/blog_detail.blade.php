@extends('layout.admin_app')
@section('content')

    <section class="py-5">
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
    <section class="py-7 position-relative" style="background: rgba(0, 0, 0, 0.05);">
        <div class="container-fluid max-width-base">
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


                    {{ $blog->description }}
                    {{--                  {{ htmlspecialchars($blog->description }}--}}
                    {{--    {{ htmlspecialchars($blog->description) }}
                      {{ htmlspecialchars_decode($blog->description) }}--}}

                    {{--<div class="mb-5">
                        <ul class="d-flex">
                            <li class="me-2">
                                <a href="javascript:void(0)" class="facebook-btn text-white">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="me-2">
                                <a href="javascript:void(0)" class="twitter-btn text-white">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="me-2">
                                <a href="javascript:void(0)" class="linkedin-btn text-white">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>--}}

                    {{--<h3 class="mb-4">Related Article</h3>

                    <div class="owl-carousel owl-theme mb-5">
                        <div class="item">
                            <div class="card bg-transparent w-100 border-0 overflow-hidden">
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
                        </div>

                        <div class="item">
                            <div class="card bg-transparent border-0 overflow-hidden w-100">
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
                        </div>

                        <div class="item">
                            <div class="card bg-transparent border-0 overflow-hidden w-100">
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
                            </div>
                        </div>

                    </div>--}}

                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body">
                            <h3 class="mb-4">Author</h3>
                            <div class="d-flex align-items-start">
                                <div class="me-3 ps-2">
                                    <img
                                        src='{{$blog->author->profile ? asset('uploadFile/author/'.$blog->author->profile) : asset('dist/images/user/user2.jpg')}}'
                                        class="rounded-circle border" height="70"
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

                    {{-- <h3 class="mb-4">Comments</h3>

                     <div class="d-md-flex d-block align-items-start mb-5 pb-5 border-bottom">
                         <div class="me-3">
                             <img src="../dist/images/owners/deep.jpg" height="50" class="mb-3 mb-md-0 rounded-circle"
                                  alt="">
                         </div>

                         <div>
                             <div class="d-md-flex d-block align-items-center justify-content-between mb-0">
                                 <h6 class="fs-5 mb-0">Javiya Deep</h6> <span class="ms-md-3 fs-14 opacity-50 ms-0">3
                                     weeks ago</span>
                             </div>
                             <p class="opacity-50">example@info.com</p>
                             <p class="mb-3">
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a. Numquam veniam
                                 repellat aliquid reprehenderit, aspernatur deleniti officia, id ipsa ipsum, eligendi
                                 itaque perferendis perspiciatis? Sapiente officiis excepturi libero quidem.
                             </p>
                             <div class="d-flex justify-content-between align-items-center">
                                 <a href="javascript:void(0)" class="reply-btn link-primary"><i
                                         class='fas fa-reply me-2'></i>Reply</a>
                                 <button type="button"
                                         class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                         class='fas fa-trash-alt me-2'></i>Delete</button>
                             </div>
                         </div>
                     </div>

                     <div class="d-md-flex d-block align-items-start mb-5 pb-5 border-bottom">
                         <div class="me-3">
                             <img src="../dist/images/owners/akash.jpg" height="50" class="mb-3 mb-md-0 rounded-circle"
                                  alt="">
                         </div>

                         <div>
                             <div class="d-md-flex d-block align-items-center justify-content-between mb-0">
                                 <h6 class="fs-5 mb-0">Akash Shah</h6> <span class="ms-md-3 fs-14 opacity-50 ms-0">5
                                     weeks ago</span>
                             </div>
                             <p class="opacity-50">example@info.com</p>
                             <p class="mb-3">
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a. Numquam veniam
                                 repellat aliquid reprehenderit, aspernatur deleniti officia, id ipsa ipsum, eligendi
                                 itaque perferendis perspiciatis? Sapiente officiis excepturi libero quidem.
                             </p>
                             <div class="d-flex justify-content-between align-items-center">
                                 <a href="javascript:void(0)" class="reply-btn link-primary"><i
                                         class='fas fa-reply me-2'></i>Reply</a>
                                 <button type="button"
                                         class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                         class='fas fa-trash-alt me-2'></i>Delete</button>
                             </div>

                             <!--  -->
                             <div class="d-md-flex d-block align-items-start mt-5">
                                 <div class="me-3">
                                     <img src="../dist/images/user/user6.jpg" height="50"
                                          class="mb-3 mb-md-0 rounded-circle" alt="">
                                 </div>

                                 <div>
                                     <div class="d-md-flex d-block align-items-center justify-content-between mb-0">
                                         <h6 class="fs-5 mb-0">Admin</h6> <span class="ms-md-3 fs-14 opacity-50 ms-0">3
                                             weeks ago</span>
                                     </div>
                                     <p class="opacity-50">example@info.com</p>
                                     <p class="mb-3">
                                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a. Numquam
                                         veniam
                                         repellat aliquid reprehenderit, aspernatur deleniti officia, id ipsa ipsum,
                                         eligendi
                                         itaque perferendis perspiciatis? Sapiente officiis excepturi libero quidem.
                                     </p>
                                     <div class="d-flex justify-content-between align-items-center">
                                         <a href="javascript:void(0)" class="reply-btn link-primary"><i
                                                 class='fas fa-reply me-2'></i>Reply</a>
                                         <button type="button"
                                                 class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                                 class='fas fa-trash-alt me-2'></i>Delete</button>
                                     </div>
                                 </div>
                             </div>

                             <!--  -->
                             <div class="d-md-flex d-block align-items-start mt-5">
                                 <div class="me-3">
                                     <img src="../dist/images/user/user2.jpg" height="50"
                                          class="mb-3 mb-md-0 rounded-circle" alt="">
                                 </div>

                                 <div>
                                     <div class="d-md-flex d-block align-items-center justify-content-between mb-0">
                                         <h6 class="fs-5 mb-0">Johnnath Andorson</h6> <span
                                             class="ms-md-3 fs-14 opacity-50 ms-0">4
                                             weeks ago</span>
                                     </div>
                                     <p class="opacity-50">example@info.com</p>
                                     <p class="mb-3">
                                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, a. Numquam
                                         veniam
                                         repellat aliquid reprehenderit, aspernatur deleniti officia, id ipsa ipsum,
                                         eligendi
                                         itaque perferendis perspiciatis? Sapiente officiis excepturi libero quidem.
                                     </p>
                                     <div class="d-flex justify-content-between align-items-center">
                                         <a href="javascript:void(0)" class="reply-btn link-primary"><i
                                                 class='fas fa-reply me-2'></i>Reply</a>
                                         <button type="button"
                                                 class="btn btn-danger d-flex align-items-center justify-content-center"><i
                                                 class='fas fa-trash-alt me-2'></i>Delete</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>--}}
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
        </div>
    </section>
@stop

