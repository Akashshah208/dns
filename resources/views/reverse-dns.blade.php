@extends('layout.app')
@section('content')
    <div class="w-100 mt-4">
        <div class="row mb-4 pb-3">
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter Server IP Address"
                           aria-label="Enter Server IP Address" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Reverse DNS Lookup</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="py-2">
                <div class="table-responsive">
                    <table class="table text-nowrap table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
