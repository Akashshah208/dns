@extends('layout.admin_app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (session()->has('result'))
                <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
                    <strong>{{ session('result')['message'] }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('admin.index') }}" method="GET">
                <div class="input-group mb-8 bg-white rounded-pill border p-2 overflow-hidden">
                    <input type="search" class="border-0 rounded-pill form-control" placeholder="Search blog..."
                           aria-label="Search blog..." name="keyword" aria-describedby="button-addon2"
                           value="{{ $keyword }}">
                    <button
                        class="btn btn-primary ms-1 d-flex align-items-center justify-content-center rounded-pill"
                        type="submit" id="button-addon2"><i class="fas fa-search me-2"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($blogs as $blog)
            <div class="col-md-6 col-lg-4 d-flex align-items-strech">
                <div class="card bg-transparent shadow-sm border-0 overflow-hidden w-100">
                    <a href="{{ route('admin.blogDetails', $blog->id) }}">
                        <div class="overflow-hidden">
                            <img
                                src='{{$blog->banner ? asset('uploadFile/blogBanner/'.$blog->banner) : asset('dist/images/user/user2.jpg')}}'
                                class="zoom-in img-fluid" alt="">
                        </div>
                    </a>
                    <div class="card-body">
                        <h4 class="mb-3">
                            <a href="{{ route('admin.blogDetails', $blog->id) }}" class="dark-link">
                                {{ $blog->title }}
                            </a>
                        </h4>
                        <span class="text-secondary">By <a href="{{ route('admin.blogDetails', $blog->id) }}"
                                                           target="_blank"
                                                           class="me-1">{{ $blog->author ? $blog->author->name : 'Unknown Author'}}</a>
                                {{ date_format($blog->created_at, "M d, Y") }}
                            </span>
                    </div>
                </div>
            </div>
        @empty
            No Data Found
        @endforelse
    </div>
@stop
