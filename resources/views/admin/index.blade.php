@extends('layout.admin_app')
@section('content')
    @if (session()->has('result'))
        <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('result')['message'] }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@stop
