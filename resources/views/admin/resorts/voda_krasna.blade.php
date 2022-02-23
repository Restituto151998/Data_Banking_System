@extends('admin.resorts.resort_nav')

@section('voda')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h4 class="m-0">Voda Krasna</h4>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead class="thead-dark">

                                                    <tr>
                                                        <th scope="col">Full Name</th>
                                                        <th scope="col">Gender</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Nationality</th>
                                                        <th scope="col">Temparature</th>
                                                        <th scope="col">Time Use</th>
                                                        <th scope="col">Purpose</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($resort_lists as $resort)
                                                        <tr>
                                                            <td>{{ $resort->full_name }}</td>
                                                            <td>{{ $resort->gender }}</td>
                                                            <td>{{ $resort->address }}</td>
                                                            <td>{{ $resort->phone_number }}</td>
                                                            <td>{{ $resort->nationality }}</td>
                                                            <td>{{ $resort->tempartaure }}</td>
                                                            <td>{{ $resort->time_use }}</td>
                                                            <td>{{ $resort->purpose }}</td>

                                                        </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
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
