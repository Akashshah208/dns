@extends('layout.admin_app')
@section('content')
    @if (session()->has('result'))
        <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('result')['message'] }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid max-width-base">
        <div class="d-md-flex d-block align-items-center justify-content-between">
            <h2 class="fw-bold mb-4">User Data List</h2>
            <div>
                <a href="{{ route('admin.userDataGeneratePdf') }}" type="button" class="btn btn-primary">
                    Generate PDF
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered align-middle mb-0">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align: center">
                        No Data Found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="mt-3 float-end">
            {!! $users->links() !!}
        </div>
    </div>
@stop
