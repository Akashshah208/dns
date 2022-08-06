@extends('layout.admin_app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="mb-4">Add Author</h1>

            <form action="{{ route('admin.storeAuthor') }}" method="POST">
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

        </div>
    </div>

@stop
