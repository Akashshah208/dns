@extends('layout.app')
@section('content')
    <div class="w-100 mt-4">
        <div class="row mb-4 pb-3">
            <div class="col-lg-6">
                <form action="{{ route('cname') }}" method="POST" id="add_college" class="forms-sample">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Domain Name"
                               aria-label="Enter Domain Name" aria-describedby="button-addon2" name="domain_name"
                               value="{{ $domain }}">
                        <button class="btn btn-primary" type="submit" id="button-addon2">CNAME Lookup</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="py-2">
                <div class="table-responsive">
                    <table class="table text-nowrap table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Test</th>
                            <th scope="col">Result</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($domain)
                            <tr>
                                <th scope="row"><img
                                        src="{{ $dmarcCheckRecord ? asset('dist/images/icon/ok.png') : asset('dist/images/icon/problem.png') }}"
                                        width="17" alt=""></th>
                                <td>DNS Record Published</td>
                                <td>{{ $dmarcCheckRecord ? 'DNS Record Found' : 'DNS Record Not Found' }}</td>
                            </tr>
                        @else
                            <tr>
                                <th scope="row" colspan="3" style="text-align: center">No Data Found</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
