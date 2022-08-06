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

            <h1 class="mb-4">Add Author</h1>

            <form class="mb-5" action="{{ route('admin.storeAuthor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile2" class="form-label opacity-75">Upload Author Profile <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="formFile2" name="profileAuth" accept=".jpg,.jpeg, .png"
                           required>
                </div>

                <div class="mb-3">
                    <label for="nameaut" class="form-label opacity-75">Enter Author Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nameaut" name="nameAuth" placeholder="Enter author name"
                           required>
                </div>

                <div class="mb-3">
                    <label for="workaut" class="form-label opacity-75">Enter Author Work Profile <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="workaut" name="workAuth"
                           placeholder="Enter author work profile"
                           required>
                </div>

                <div class="mb-5">
                    <label for="discaut" class="form-label opacity-75">Enter Author Discription <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="discaut" name="discAuth"
                           placeholder="Enter author discription"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">Add Author</button>
            </form>

            <h2 class="mb-4">Author List</h2>

            <div class="table-responsive">
                <table class="table text-nowrap table-bordered align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Work Profile</th>
                        <th scope="col">Discription</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($authors))
                        @forelse($authors as $author)
                            <tr>
                                <td>
                                    <img
                                        src='{{$author->profile ? asset('uploadFile/author/'.$author->profile) : asset('dist/images/user/user2.jpg')}}'
                                        class="rounded-circle" height="50" alt="">
                                </td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->work }}</td>
                                <td>{{ $author->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center">
                                    No Data Found
                                </td>
                            </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center">
                                No Data Found
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
