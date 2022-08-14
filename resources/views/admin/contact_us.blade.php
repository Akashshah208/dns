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
            <h2 class="fw-bold mb-4">Blog Detail</h2>
            <div>
                <a href="{{ route('admin.contactUsGeneratePdf') }}" type="button" class="btn btn-success">
                    Generate PDF
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-nowrap table-bordered align-middle mb-0">
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->first_name }}</td>
                    <td>{{ $contact->last_name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone_no }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a type="button" href="{{ route('admin.contactUsDelete', $contact->id) }}"
                           class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center">
                        No Data Found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop
