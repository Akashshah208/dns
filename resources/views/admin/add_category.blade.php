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

            <h2 class="mb-4">Add Category</h2>

            <form class="mb-5" action="{{ route('admin.storeCategory') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label opacity-75">Add Category <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Enter category"
                           required>
                </div>


                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>

            <h2 class="mb-4">Category List</h2>

            <div class="table-responsive">
                <table class="table text-nowrap table-bordered align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @if(!empty($categories))
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    <a href="javascript:void(0)" class="bg-dark me-1 mb-1 text-white badge">
                                        {{ $category->name }}
                                    </a>
                                </td>
                                <td><a type="button" href="{{ route('admin.categoryDelete', $category->id) }}"
                                       class="btn btn-sm btn-danger">Delete</a></td>
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
                </table>
            </div>
        </div>
    </div>

@stop
