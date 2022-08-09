@extends('layout.admin_app')
@section('content')
    @if (session()->has('result'))
        <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('result')['message'] }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2 class="fw-bold mb-4">Privacy Policy</h2>

    <form class="mb-5" action="{{ route('admin.storePrivacyPolicy') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label opacity-75">Privacy Policy</label>
            <textarea name="policy" id="policy" cols="30" rows="10" class="summernote"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save changes</button>
    </form>

    <div class="d-md-flex d-block align-items-center justify-content-between mb-4">
        <h2 class="fw-bold mb-3 mb-md-0">Privacy Policy Listing</h2>
        @if($privacyPolicy)
            <a type="button" href="{{ route('admin.privacyPolicyDelete', $privacyPolicy->id) }}" class="btn btn-danger">Delete</a>
        @endif
    </div>

    @php
        if ($privacyPolicy)
            echo("$privacyPolicy->policy");
        else
            echo ("<p> No Data Found </p>");
    @endphp

    {{--<h4 class="fw-bold mb-3">Lorem ipsum dolor sit amet.</h4>
    <p class="opacity-50 mb-5">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis maiores nesciunt dolor, non
        mollitia perspiciatis ex facilis odio sequi quaerat sed aliquam necessitatibus amet inventore
        doloremque magni est fugit debitis?
    </p>--}}


@stop
