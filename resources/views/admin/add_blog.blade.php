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

            <h1 class="mb-4">Add Blog</h1>

            <form class="mb-5" action="{{ route('admin.storeBlog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label opacity-75">Add Blog
                        Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title"
                           required>
                </div>

                <div class="mb-3">
                    <label for="select2-with-tags" class="form-label opacity-75">Add Tags</label>
                    <select class="form-control" multiple="" id="select2-with-tags" name="tags[]">
                        <option disabled>Select Tags</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option disabled>No Category Found</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label opacity-75">Upload Banner <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="formFile" name="banner" accept=".jpg,.jpeg, .png"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label opacity-75">Add
                        Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="summernote"></textarea>
                </div>

                <div class="mb-5">
                    <label for="discaut" class="form-label opacity-75">Select Blog Author <span
                            class="text-danger">*</span></label>
                    <select class="form-select" name="auth">
                        <option value="1">Select Blog Author</option>
                        @forelse($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @empty
                            <option disabled> No Data Found</option>
                        @endforelse
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Blog</button>
            </form>
        </div>
    </div>
@stop

