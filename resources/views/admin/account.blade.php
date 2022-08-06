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
            <h1 class="mb-4">Account Setting</h1>

            <form action="{{ route('admin.accountUpdate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pass" class="form-label opacity-75">Eamil <span
                            class="text-danger">*</span></label>
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                           value="{{ $user->email }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label opacity-75">Password <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password"
                           required>
                </div>
                <div class="mb-4">
                    <label for="re-pass" class="form-label opacity-75">Re-enter Password <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="re-pass" name="re-password"
                           placeholder="Re - Enter Password"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">Change Setting</button>
            </form>
        </div>
    </div>
@stop
