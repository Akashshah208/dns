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

            <h2 class="mb-4">Founder's Note</h2>

            <form class="mb-5">
                <div class="mb-3">
                    <label for="formProfile" class="form-label opacity-75">Founder's Profile <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="formProfile" required>
                </div>

                <div class="mb-3">
                    <label for="formName" class="form-label opacity-75">Founder's Name <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="formName" required>
                </div>

                <div class="mb-3">
                    <label for="formWork" class="form-label opacity-75">Work Profile <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="formWork" required>
                </div>

                <div class="mb-4">
                    <label for="nameaut" class="form-label opacity-75">Add discription <span
                            class="text-danger">*</span></label>
                    <div class="summernote">
                        <h5>Add discription</h5>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Founder Note</button>
            </form>

        </div>


        <div class="row">
            <h2 class="mb-4">Founder's List</h2>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="../dist/images/owners/akash.jpg" alt="" height="100" width="100"
                                 class="rounded-circle">
                        </div>
                        <div class="text-center">
                            <h3>Akash Shah</h3>
                            <a href="javascript:void(0)">
                                <i class="fab fa-linkedin fs-7"></i>
                            </a>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam dolore
                                sunt nemo, obcaecati a soluta eum qui minus eligendi quos blanditiis harum
                                fuga in praesentium dignissimos necessitatibus totam mollitia delectus
                                libero vel. Deleniti deserunt ad debitis totam possimus veritatis omnis.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam amet, hic
                                cumque, nemo officia, iusto error sunt quo accusamus magnam debitis sed.
                                Doloribus iste illum quasi dolorem vitae optio labore nesciunt, inventore
                                unde quidem rem debitis repellendus animi. Magni qui blanditiis soluta
                                praesentium odit perspiciatis temporibus, eligendi vitae voluptate minima
                                labore velit eius fuga fugiat rem quibusdam incidunt. Deleniti, minus!
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="../dist/images/owners/deep.jpg" alt="" height="100" width="100"
                                 class="rounded-circle">
                        </div>
                        <div class="text-center">
                            <h3>Deep Javiya</h3>
                            <a href="javascript:void(0)">
                                <i class="fab fa-linkedin fs-7"></i>
                            </a>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam dolore
                                sunt nemo, obcaecati a soluta eum qui minus eligendi quos blanditiis harum
                                fuga in praesentium dignissimos necessitatibus totam mollitia delectus
                                libero vel. Deleniti deserunt ad debitis totam possimus veritatis omnis.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam amet, hic
                                cumque, nemo officia, iusto error sunt quo accusamus magnam debitis sed.
                                Doloribus iste illum quasi dolorem vitae optio labore nesciunt, inventore
                                unde quidem rem debitis repellendus animi. Magni qui blanditiis soluta
                                praesentium odit perspiciatis temporibus, eligendi vitae voluptate minima
                                labore velit eius fuga fugiat rem quibusdam incidunt. Deleniti, minus!
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
