@extends('admin.side_navbar')

@section('resortList')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                            <div class="card-header text-center font-weight-bold">
                                                <h2>Resort List </h2>
                                            </div>
                                            <div class="container">
                                                @foreach ($resort_lists as $resort)
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Resort Name</th>
                                                                <th scope="col">Assigned Staff</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $resort->resort_name }}</td>
                                                                <td>{{ $resort->assigned_staff }}</td>
                                                                <td>{{ $resort->status }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
