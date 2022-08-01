@extends('layout.app')
@section('content')
    <div class="w-100 mt-4">
        <div class="row mb-4 pb-3">
            <div class="col-lg-6">
                <form action="{{ route('email_server_tester') }}" method="POST" id="add_college" class="forms-sample">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Email server IP Address"
                               aria-label="Enter Email server IP Address" name="email" aria-describedby="button-addon2"
                               value="{{ $domain }}">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Email Server
                            Tester
                        </button>
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
                            <th scope="col">Pref</th>
                            <th scope="col">Hostname</th>
                            <th scope="col">IP4</th>
                            <th scope="col">IPV6</th>
                            <th scope="col">TTL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($mxLookupData)
                            @forelse ($mxLookupData as $key => $data)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $data['pri'] }}</td>
                                    <td>{{ $data['target'] }}</td>
                                    <td> {{ $ip[0]['ip'] ?? 'N/A' }} </td>
                                    <td> {{ $ip[1]['ipv6'] ?? 'N/A' }} </td>
                                    {{--@foreach($ip as $ipData)
                                        <td>{{ $ipData['ip'] ?? $ipData['ipv6'] }}</td>
                                    @endforeach--}}
                                    <td>{{ $data['ttl'] . ' Sec' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="6" style="text-align: center">No Data Found</th>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <th scope="row" colspan="6" style="text-align: center">No Data Found</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
