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

            <h2 class="mb-4">About Us</h2>

            <form class="mb-5" action="{{ route('admin.storeAbout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="formFile2" class="form-label opacity-75">Title <span
                            class="text-danger">*</span></label>
                    <input type="hidden" name="id" value="{{ $about->id }}">
                    <input class="form-control" type="text" id="formFile2" name="title" value="{{ $about->title }}"
                           placeholder="Enter Title" required>
                </div>

                <div class="mb-4">
                    <label for="nameaut" class="form-label opacity-75">Add Description <span
                            class="text-danger">*</span></label>
                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" required>
                        @php
                            echo("$about->description");
                        @endphp
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update About</button>
            </form>

            <div class="card">
                <div class="card-body">
                    <h4>{{ $about->title }}</h4>
                    @php
                        echo("$about->description");
                    @endphp
                    {{--<button type="button" class="btn btn-danger mt-2">Delete</button>--}}
                </div>
            </div>


                <hr>

                <h2 class="mb-4">Founder's Note</h2>

                <form class="mb-5" action="{{ route('admin.storeFounder') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formProfile" class="form-label opacity-75">Founder's Profile <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="formFile2" name="profile" accept=".jpg,.jpeg, .png"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="formName" class="form-label opacity-75">Founder's Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" id="formName" placeholder="Founder's Name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="formWork" class="form-label opacity-75">Work Profile <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="work" id="formWork" placeholder="Work Profile"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="nameaut" class="form-label opacity-75">Add Description <span
                                class="text-danger">*</span></label>
                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" required>
                    </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Founder Note</button>
                </form>

        </div>


        <div class="row">
            <h2 class="mb-4">Founder's List</h2>
            @forelse($founders as $founder)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-3">
                                <img
                                    src='{{$founder->profile ? asset('uploadFile/founder/'.$founder->profile) : asset('dist/images/user/user2.jpg')}}'
                                    alt="" height="100" width="100"
                                    class="rounded-circle">
                            </div>
                            <div class="text-center">
                                <h3>{{ $founder->name }}</h3>
                                @php
                                    echo("$founder->description");
                                @endphp
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a type="button" href="{{ route('admin.founderDelete', $founder->id) }}"
                                   class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p> No Data Found</p>
            @endforelse
        </div>
    </div>
@stop
